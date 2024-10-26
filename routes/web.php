<?php

use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\signupController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/dashboard', function () {
    return view('dashboard', ['title'=>'Dashboard']);
});

// Route untuk menampilkan daftar produk
Route::get('/products', [ProductController::class, 'index'])->name('products');

// Route untuk menampilkan form tambah produk
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Route untuk menyimpan produk baru
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Route untuk menampilkan form edit produk
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Route untuk memperbarui produk
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

// Route untuk menghapus produk
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

// Route::get('/signup', function () {
//     return view('signup');
// });
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/dashboard/product', function () {
    return view('dashboard.product',['title'=>'Dashboard']);
});
Route::get('/categories', [CategoryProductController::class, 'index'])->name('categories');



Route::get('/product/{id}', [ProductDetailsController::class, 'showProductDetails'])->name('product.show');


Route::get('/shop', [ProductController::class, 'index'])->name('products.index');



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');

// Route untuk proses login
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/signup', [signupController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [SignupController::class, 'signup'])->name('signup');

Route::get('/categories/{id}', [CategoryProductController::class, 'show'])->name('categories.show');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');