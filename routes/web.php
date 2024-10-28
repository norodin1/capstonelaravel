<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\LoginController;
use App\Models\Listing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//All Listings
Route::get('/', [ListingController::class, 'index'])->name('home');

//Single Listing
Route::get('/listings/showListing/{id}', function ($id) {
    return view('listings.showListing' , [
        'listing' => Listing::find($id)
    ]);
});



// search
Route::get('/listings/search', [ListingController::class, 'search'])->name('search');


// login
Route::get('/login', [ListingController::class, 'login'])->name('login');
// logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// register
Route::get('/register', [ListingController::class, 'register'])->name('register');

// admin
Route::group(['prefix'=>'admin'], function(){
    Route::get('/', function () {
        if (auth()->check()) {
            return redirect()->route('admin.home');
        }
        return redirect()->route('admin.login');
    });
    Route::post('/login', [ListingController::class, 'admin'])->name('admin.login');
    Route::get('/home', [ListingController::class, 'adminHome'])->name('admin.home');
    Route::group(['prefix'=>'list'], function(){
        Route::post('/selling', [ListingController::class, 'createListing'])->name('admin.create.listing');
        Route::get('/selling', [ListingController::class, 'sellingList'])->name('admin.ListSelling');
        Route::get('/users', [ListingController::class, 'userList'])->name('admin.ListUsers');
    });
});

Route::post('/login/admin', [LoginController::class, 'authenticate'])->name('login.admin');
Route::post('/create', [LoginController::class, 'create'])->name('create.user');
Route::post('/login/user', [LoginController::class, 'authenticate'])->name('login.user');