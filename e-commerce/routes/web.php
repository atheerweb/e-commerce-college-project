<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\SupportController;

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

Route::get('', [ProductsController::class, 'index']);

Auth::routes();

Route::post('/cart', [CartsController::class, 'store'])->name('cart');
Route::get('/cart', [CartsController::class, 'index'])->name('cart');
Route::get('/search/{name}', [ProductsController::class, 'search'])->name('search');
Route::get('/checkout', [CartsController::class, 'show'])->name('checkout');
Route::post('/support', [SupportController::class, 'store'])->name('support');
Route::get('/admin', [SupportController::class, 'index'])->name('support');
Route::post('/process/user/payment ', [CartsController::class, 'process_payment'])->name('support');
