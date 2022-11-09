<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardOrderController;
use App\Http\Controllers\DashboardCartController;


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
// Route::get('/orders/{product:slug}', [OrderController::class, 'show'])->middleware('auth');
// Route::post('/orders/{product:slug}', [OrderController::class, 'store'])->middleware('auth');
Route::post('/products/{product:slug}', [ProductController::class, 'store'])->middleware('auth');

Route::get('/products', [ProductController::class, 'index'])->middleware('auth');
Route::get('/orders', [OrderController::class, 'index'])->middleware('auth');
Route::get('/orders/{user:username}', [OrderController::class, 'show'])->middleware('auth');
Route::post('/orders/{user:username}', [OrderController::class, 'store'])->middleware('auth');
Route::get('/checkout', [OrderController::class, 'checkout'])->middleware('auth');

Route::get('/products/{user:username}', [ProductController::class, 'checkout'])->middleware('auth');

Route::get('/carts', [CartController::class, 'index'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/products', DashboardProductController::class)->middleware('auth');
Route::get('/dashboard/checkout', [DashboardOrderController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/cart', DashboardCartController::class)->middleware('auth');
