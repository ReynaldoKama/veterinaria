<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitasController;

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
Route::post('/add-to-cart/{id}', [ProductsController::class, 'addToCart'])->name('add.to.cart');


Route::get('/citas', [CitasController::class, 'index'])->name('citas.index');
Route::post('/citas/agendar', [CitasController::class, 'store'])->name('citas.store');