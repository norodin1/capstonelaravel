<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ListingController extends Controller
{
    //Show all listings
    public function index()
    {
        $this->getCart();
        return view('listings.index', [
            'listings' => Listing::all()
        ]);
    }
    
    //Show single listing
    public function showListing(Listing $listing)
    {
        $this->getCart();
        return view('listings.showListing', [
            'listing' => $listing
        ]);
    }

     //Search
     public function search()   
     {
        $this->getCart();
         return view('listings.search', [   
            'listings' => Listing::when(request('keyword'), function ($query) {
                return $query->where('itemName', 'like', '%' . request('keyword') . '%');
            })->when(request('category'), function ($query) {
                return $query->where('category', request('category'));
            })->get()
         ]);
     }
     

    public function login ()
    {
        return view('auth.login');
    }

    public function register ()
    {
        return view('auth.register');
    }

    public function admin ()
    {
        return view('auth.admin');
    }
    public function adminHome ()
    {
        return view('listings.adminHome');
    }

    public function sellingList ()
    {
        return view('listings.createListing', [
            'listings' => Listing::paginate(4)
        ]);
    }
    public function createListing ()
    {
        $validator = Validator::make(request()->all(),[
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'category' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        if(request()->hasFile('image')){
            $destination = '/public/img/listings';
            $image_name = request()->file('image')->getClientOriginalName();
            $path = request()->file('image')->storeAs($destination, $image_name);
        }
        $listing = Listing::create([
            'itemName' => request()->get('name'),
            'itemPrice' => request()->get('price'),
            'category' => request()->get('category'),
            'stock' => request()->get('stock'),
            'description' => request()->get('description'),
            'image' => $image_name
        ]);
        return redirect()->back();
    }
    public function editListing ()
    {
        $validator = Validator::make(request()->all(),[
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'category' => 'required',
            'stock' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $update = [
            'itemName' => request()->get('name'),
            'itemPrice' => request()->get('price'),
            'category' => request()->get('category'),
            'stock' => request()->get('stock'),
            'description' => request()->get('description'),
        ];
        if(request()->hasFile('image')){
            $destination = '/public/img/listings';
            $image_name = request()->file('image')->getClientOriginalName();
            $path = request()->file('image')->storeAs($destination, $image_name);
            $update['image'] = $image_name;
        }
        $listing = Listing::find(request()->get('id'))->update($update);
        return redirect()->back();
    }
    public function deleteListing ()
    {
        $listing = Listing::find(request()->get('id'))->delete();
        return redirect()->back();
    }

    public function userList ()
    {
        return view('listings.userList', [
            'users' => User::paginate(5)
        ]);
    }

    public function createAdminUser ()
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
        return redirect()->back();
    }

    public function editUser ()
    {
        $validator = Validator::make(request()->all(),[
            'password' => 'required|confirmed',
            
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $user = User::find(request()->get('id'))->update([
            'password' => bcrypt(request()->get('password')),
        ]);
        return redirect()->back();
    }

    public function deleteUser ()
    {
        $user = User::find(request()->get('id'))->delete();
        return redirect()->back();
    }

    public function addCart ()
    {
        $cart = Cart::where('itemId', request()->get('itemId'))->first();
        if ($cart) {
            # code...
            $cart->update([
                'qty' => $cart->qty + 1
            ]);
        }else{
            Cart::create([
                'itemId' => request()->get('itemId'),
                'userId' => auth()->user()->id,
                'qty' => 1,
            ]);
        }
        return back();
    }
    public function cartList ()
    {   $cart = Cart::where('userId', auth()->user()->id)->get();
        $total = 0;
        foreach ($cart as $key => $value) {
            $total += $value->qty * $value->itemDetails->itemPrice;
        }
        return view('listings.cartList', [
            'carts' => $cart,
            'total' => $total
        ]);
    }
    private function getCart(){
        if(auth()->check() && auth()->user()->type != 'admin'){
            $cart = Cart::where('userId', auth()->user()->id)->get();
            session(['carts'=> $cart]);
        }
    }

    public function deletecartList ()
    {
        $cart = Cart::find(request()->get('id'))->delete();
        $this->getCart();
        return redirect()->back();
    }
    public function changeQty ()
    { 
        dd(request()->all());
        return redirect()->back();
    }

    public function checkout () {
        return view('listings.checkout');
    }
    public function complete () {
        return view('listings.transComplete');
    }

    public function completeCart () {
        return redirect()->route('listing.cart.complete');
    }


}
