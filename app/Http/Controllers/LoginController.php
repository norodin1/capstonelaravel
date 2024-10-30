<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Console\View\Components\Warn;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $user = User::where('email', $request->get('email'))->first();
        // dd(url()->previous());
        if (((!request()->routeIs('admin.*') && $user->type == 'user') || (request()->routeIs('admin.*') && $user->type == 'admin')) && Auth::attempt($credentials)) {
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
        $route = 'home';
        if(auth()->user()->type == 'admin'){
            $route = 'admin.login.view';
        }
        Auth::logout();
        return redirect()->route($route);

    }

    
}
