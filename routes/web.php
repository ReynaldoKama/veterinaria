<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/welcome');
})->name('home');

// Route::get('/productos', function () {
//     return view('products/index');
// })->name('productos');
Route::get('/productos', [ProductsController::class, 'index'])->name('product.index');
Route::get('/productos/create', [ProductsController::class, 'create'])->name('product.create');
Route::get('/login', function () {
    return view('login/index');
})->name('login');
