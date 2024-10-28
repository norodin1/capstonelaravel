<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            if(auth()->user()->type == 'admin'){
                return redirect()->route('admin.home');
            }
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function create()
    {
        
        $validator = Validator::make(request()->all(),[
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|confirmed',
            
        ], [
            'password.confirmed' => 'The repeat password does not match.'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user = User::create([
            'name' => request()->get('name'),
            'email' => request()->get('email'),
            'password' => bcrypt(request()->get('password')),
            'type' => request()->get('type'),
            
        ]);
        return redirect()->route('login');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');

    }

    
}
