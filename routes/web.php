<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

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
// login
Route::get('/login', [ListingController::class, 'login'])->name('login');
// register
Route::get('/register', [ListingController::class, 'register'])->name('register');