<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

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

    public function userList ()
    {
        return view('listings.userList');
    }

}
