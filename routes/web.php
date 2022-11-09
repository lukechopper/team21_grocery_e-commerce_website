<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/product/{id}', [ProductController::class, 'viewProduct'])->name('viewProduct');

Route::get('/signup', function () {
    return view('Signup');
})->name('signup');

Route::get('/dummy-data', [ProductController::class, 'addDummyData']);
