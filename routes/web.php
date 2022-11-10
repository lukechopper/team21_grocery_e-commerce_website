<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

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

Route::post('/make-order', [OrderController::class, 'makeOrder'])->name('makeOrder');

Route::get('/signup', function () {
    return view('Signup');
})->name('signup');

Route::get('/dummy-data', [ProductController::class, 'addDummyData']);
