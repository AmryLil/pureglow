<?php

use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route untuk halaman utama
Route::get('/', function () {
    return view('index');
});

// Route untuk login
Route::get('/login', [LoginController::class,  'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Route untuk signup
Route::get('/signup', [SignupController::class,  'showSignupForm'])->name('signup');
Route::post('/signup', [SignupController::class, 'signup'])->name('signup');

Route::post('/dashboard/produk/add', [ProductController::class, 'store'])->name('products.store');

Route::resource('products', CategoryProductController::class);

Route::get('/kategori', [CategoryProductController::class,      'index'])->name('categories');
Route::get('/kategori/{id}', [CategoryProductController::class, 'show'])->name('categories.show');

Route::prefix('dashboard')->group(function () {
    // Route untuk menampilkan semua kategori produk di dashboard
    Route::get('/kategori', [CategoryProductController::class, 'kategori_dashboard'])->name('dashboard.kategori.index');

    // Route untuk menampilkan semua kategori produk (umum)
    Route::get('/categories', [CategoryProductController::class, 'index'])->name('dashboard.category_products.index');

    // Route untuk menampilkan form tambah kategori produk
    Route::get('/categories/create', [CategoryProductController::class, 'create'])->name('dashboard.category_products.create');

    // Route untuk menyimpan kategori produk baru
    Route::post('/categories', [CategoryProductController::class, 'store'])->name('dashboard.category_products.store');

    // Route untuk menampilkan kategori produk tertentu berdasarkan ID
    // Route::get('/categories/{id}', [CategoryProductController::class, 'show'])->name('dashboard.category_products.show');

    // Route untuk menampilkan form edit kategori produk berdasarkan ID
    Route::get('/categories/{id}/edit', [CategoryProductController::class, 'edit'])->name('dashboard.category_products.edit');

    // Route untuk memperbarui kategori produk berdasarkan ID
    Route::put('/categories/{id}', [CategoryProductController::class, 'update'])->name('dashboard.category_products.update');

    // Route untuk menghapus kategori produk berdasarkan ID
    Route::delete('/categories/{id}', [CategoryProductController::class, 'destroy'])->name('dashboard.category_products.destroy');
});
// Route untuk dashboard (hanya bisa diakses oleh pengguna yang sudah login)
Route::get('/dashboard', function () {
    return view('dashboard.index', ['title' => 'Dashboard']);
})->middleware('auth');

Route::get('/dashboard/produk/add', function () {
    return view('dashboard.produk.add', ['title' => 'Dashboard']);
})->middleware('auth');
Route::get('/dashboard/produk', [ProductController::class, 'showProduct'])->name('dashboard.produk')->middleware('auth');

// Route untuk cart
Route::get('/cart', function () {
    return view('cart');
});

// Route untuk kategori produk

// Route untuk detail produk
Route::get('/product/{id}', [ProductDetailsController::class, 'showProductDetails'])->name('product.show');

// Route untuk produk
Route::get('/shop', [ProductController::class, 'index'])->name('products.index');

// Route untuk logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
