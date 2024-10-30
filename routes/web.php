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
// cart
Route::post('/listings/cart/add', [ListingController::class, 'addCart'])->name('listing.cart.add');
Route::get('/listings/cart/list', [ListingController::class, 'cartList'])->name('listing.cart.list');
Route::post('/listings/cart/delete', [ListingController::class, 'deletecartList'])->name('listing.cart.delete');
Route::post('/listings/cart/change', [ListingController::class, 'changeQty'])->name('listing.cart.change');
Route::get('/listings/cart/checkout', [ListingController::class, 'checkout'])->name('listing.cart.checkout');
Route::get('/listings/cart/complete', [ListingController::class, 'complete'])->name('listing.cart.complete');
Route::post('/listings/cart/complete', [ListingController::class, 'completeCart'])->name('listing.cart.completeCart');


// login
Route::get('/login', [ListingController::class, 'login'])->name('login');
// logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// register
Route::get('/register', [ListingController::class, 'register'])->name('register');

// admin
Route::group(['prefix'=>'admin'], function(){
    Route::get('/', function () {
        if (auth()->check() && auth()->user()->type == 'admin') {
            return redirect()->route('admin.home');
        }
        return redirect()->route('admin.login.view');
    });
    Route::get('/login', [ListingController::class, 'admin'])->name('admin.login.view');
    Route::get('/home', [ListingController::class, 'adminHome'])->name('admin.home');
    Route::group(['prefix'=>'list'], function(){
        Route::post('/selling', [ListingController::class, 'createListing'])->name('admin.create.listing');
        Route::post('/selling/update', [ListingController::class, 'editListing'])->name('admin.update.listing');
        Route::post('/selling/delete', [ListingController::class, 'deleteListing'])->name('admin.delete.listing');
        Route::get('/selling', [ListingController::class, 'sellingList'])->name('admin.ListSelling');
        Route::get('/users', [ListingController::class, 'userList'])->name('admin.ListUsers');
        Route::post('/users/create', [ListingController::class, 'createAdminUser'])->name('admin.create.user');
        Route::post('/users/update', [ListingController::class, 'editUser'])->name('admin.update.user');
        Route::post('/users/delete', [ListingController::class, 'deleteUser'])->name('admin.delete.user');
    });
});

Route::post('/login/admin', [LoginController::class, 'authenticate'])->name('admin.login');
Route::post('/create', [LoginController::class, 'create'])->name('create.user');
Route::post('/login/user', [LoginController::class, 'authenticate'])->name('user.login');