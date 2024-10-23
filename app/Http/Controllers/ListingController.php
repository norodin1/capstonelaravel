<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListingController extends Controller
{
    //Show all listings
    public function index()
    {
        
        return view('listings.index', [
            'listings' => [
                [
                    'id' => 1,
                    'itemName' => 'White-Shirt',
                    'itemPrice' => '$599',
                    'category' => 'top',
                ],
                [
                    'id' => 2,
                    'itemName' => 'Blue-Shirt',
                    'itemPrice' => '$699',
                    'category' => 'top',
                ],
                [
                    'id' => 3,
                    'itemName' => 'White-Pants',
                    'itemPrice' => '$599',
                    'category' => 'bottom',
                ],
                [
                    'id' => 1,
                    'itemName' => 'Blue-Pants',
                    'itemPrice' => '$799',
                    'category' => 'Bottom',
                ]
            ]
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
}
