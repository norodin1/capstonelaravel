<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ListingController extends Controller
{
    //Show all listings
    public function index()
    {
        
        return view('listings.index', [
            'listings' => Listing::all()
        ]);
    }
    
    //Show single listing
    public function showListing(Listing $listing)
    {
        return view('listings.showListing', [
            'listing' => $listing
        ]);
    }

     //Search
     public function search()   
     {
         return view('listings.search', [   
            'listing' => Listing::when(request('keyword'), function ($query) {
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
            'listings' => Listing::all()
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
            $destination = 'img/listings';
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

    public function userList ()
    {
        return view('listings.userList');
    }

}
