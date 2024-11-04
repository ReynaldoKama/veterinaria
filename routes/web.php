<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/welcome');
})->name('home');

Route::get('/productos', function () {
    return view('products/index');
})->name('productos');
Route::get('/login', function () {
    return view('login/index');
})->name('login');
