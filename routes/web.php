<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\B2BController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/cart', [ProductController::class, 'cart'])->name('product.cart');

Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/b2b', [B2BController::class, 'index'])->name('b2b');

