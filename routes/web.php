<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class, 'returnHomeView'])->name('home');

Route::get('/filter/{category}', [ProductController::class, 'returnCategories'])->name('filterHome');

Route::get('/product/{id}', [ProductController::class, 'viewProduct'])->name('viewProduct');

Route::post('/search', [ProductController::class, 'viewSearch'])->name('viewSearch');

Route::get('/basket', [OrderController::class, 'viewBasket'])->name('viewBasket')->middleware('auth');

Route::get('/past-orders', [OrderController::class, 'viewPastOrders'])->name('viewPastOrders')->middleware('auth');

Route::get('/admin-info', [UserController::class, 'viewAdminInfo'])->name('viewAdminInfo')->middleware('auth');

Route::post('/delete-from-basket', [OrderController::class, 'deleteFromBasket'])->name('deleteFromBasket')->middleware('auth');

Route::post('/make-order', [OrderController::class, 'makeOrder'])->name('makeOrder')->middleware('auth');

Route::post('/purchase', [OrderController::class, 'makePurchase'])->name('makePurchase')->middleware('auth');

Route::get('/login', [UserController::class, 'accessLogin'])->name('login');

Route::get('/signup', [UserController::class, 'accessSignup'])->name('signup');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/register', [UserController::class, 'signup'])->name('register')->middleware('guest');

Route::get('contact-us', function(){
    return view('contactus');
})->name('contactUs');

Route::get('about-us', function(){
    return view('aboutus');
})->name('aboutUs');

Route::post('/access-account', [UserController::class, 'login'])->name('accessAccount')->middleware('guest');

//Route::get('/dummy-data', [ProductController::class, 'addDummyData']);
