<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;


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

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        'active' => "home"
    ]);
})->middleware('auth');

Route::get('/products/{product:slug}', [ProductController::class, 'show'])->middleware('auth');
Route::post('/products/{product:slug}', [ProductController::class, 'store'])->middleware('auth');

Route::get('/products', [ProductController::class, 'index'])->middleware('auth');
Route::get('/products/{user:username}', [ProductController::class, 'showuserproduct'])->middleware('auth');

Route::get('/carts', [ProductController::class, 'cart'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/products', DashboardProductController::class)->middleware('auth');