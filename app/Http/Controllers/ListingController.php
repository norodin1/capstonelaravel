<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListingController extends Controller
{
    //Show all listings
    public function index()
    {
        // dd(request());
        // dd(request()->tag);
        return view('listings.index');
    }
}
