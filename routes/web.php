<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\TransaksiController;
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

Route::middleware(['auth'])->group(function () {
    // Rute untuk menampilkan semua produk
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');

    // Rute untuk menampilkan dashboard produk
    Route::get('/dashboard/produk', [ProductController::class, 'showProduct'])->name('dashboard.produk');

    // Rute untuk menampilkan form untuk menambahkan produk
    Route::get('/dashboard/produk/create', [ProductController::class, 'create'])->name('products.create');

    // Rute untuk menyimpan produk baru
    Route::post('/dashboard/produk', [ProductController::class, 'store'])->name('products.store');

    // Rute untuk menampilkan detail produk
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

    // Rute untuk menampilkan form edit produk
    Route::get('/dashboard/produk/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

    // Rute untuk memperbarui produk
    Route::put('/dashboard/produk/{id}', [ProductController::class, 'update'])->name('products.update');

    // Rute untuk menghapus produk
    Route::delete('/dashboard/produk/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
});

Route::get('/kategori', [CategoryProductController::class,      'index'])->name('categories');
Route::get('/kategori/{id}', [CategoryProductController::class, 'show'])->name('categories.show');

Route::prefix('dashboard')->group(function () {
    // Route untuk menampilkan semua kategori produk di dashboard
    Route::get('/kategori', [CategoryProductController::class, 'kategori_dashboard'])->name('dashboard.kategori.index');

    // Route untuk menampilkan semua kategori produk (umum)
    Route::get('/categories', [CategoryProductController::class, 'index'])->name('dashboard.category_products.index');

    // Route untuk menampilkan form tambah kategori produk
    Route::get('/categories/tambah', [CategoryProductController::class, 'create'])->name('dashboard.category_products.create');

    // Route untuk menyimpan kategori produk baru
    Route::post('/categories', [CategoryProductController::class, 'store'])->name('dashboard.category_products.store');

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
Route::post('/create-transaction', [PaymentController::class, 'createTransaction']);

Route::post('/store-pending-transaction', [PaymentController::class, 'storePendingTransaction']);
// cart
Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/view', [CartController::class,             'showCart'])->name('cart.view');
Route::delete('/cart/{productId}', [CartController::class,   'removeFromCart'])->name('cart.remove');

Route::get('/transaksi', [TransaksiController::class,           'index'])->name('transaksi.index')->middleware('auth');
Route::get('/dashboard/transaksi', [TransaksiController::class, 'showAll'])->name('transaksi.showAll');
