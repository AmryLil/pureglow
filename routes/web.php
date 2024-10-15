<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/signup', function () {
    return view('signup');
});
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/categories', function () {
    return view('categories');
});

Route::get('/shop', [ProductController::class, 'index']);