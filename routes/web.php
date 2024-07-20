<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ProductController::class, 'index']);

Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add_to_cart');
Route::get('remove-from-cart', [ProductController::class, 'remove'])->name('remove_from_cart');
Route::get('cart', [ProductController::class, 'cart'])->name('cart');
