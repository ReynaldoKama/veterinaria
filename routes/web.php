<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitasController;

Route::get('/', function () {
    return view('/welcome');
})->name('home');

Route::get('/register', [RegisterController::class, 'index'])->name('registrar');

Route::get('/google-auth/redirect', [RegisterController::class, 'googleRedirect'])->name('google.auth');
Route::get('/google-auth/callback', [RegisterController::class, 'googleCallback'])->name('google.auth.callback');

Route::post('/register', [RegisterController::class, 'register'])->name('registrar-usuario');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login-usuario');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/productos', [ProductsController::class, 'index'])->name('product.index');
Route::get('/productos/create', [ProductsController::class, 'create'])->middleware(['auth','can:admin.product.create'])->name('product.create');

Route::post('/add-to-cart/{id}', [ProductsController::class, 'addToCart'])->name('add.to.cart');


Route::get('/citas', [CitasController::class, 'index'])->name('citas.index');
Route::post('/citas/agendar', [CitasController::class, 'store'])->name('citas.store');