<?php
use App\Http\Controllers\{
    CartController,
    CategoryProductController,
    LoginController,
    PaymentController,
    ProductController,
    ProductDetailsController,
    SignupController,
    TransaksiController
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route untuk halaman utama
Route::get('/', [ProductController::class, 'Best4Product']);

// Route untuk login
Route::get('/login', [LoginController::class,  'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Route untuk signup
Route::get('/signup', [SignupController::class,  'showSignupForm'])->name('signup');
Route::post('/signup', [SignupController::class, 'signup'])->name('signup');

Route::get('/shop', [ProductController::class, 'index'])->name('products.index');
Route::view('/about', 'about_us')->name('about');

Route::get('/kategori', [CategoryProductController::class,      'index'])->name('categories');
Route::get('/kategori/{id}', [CategoryProductController::class, 'show'])->name('categories.show');

// Rute yang membutuhkan autentikasi
Route::middleware(['auth'])->group(function () {
    // Rute produk
    Route::get('/products', [ProductController::class,            'index'])->name('products.index');
    Route::get('/product/{id}', [ProductDetailsController::class, 'showProductDetails'])->name('product.show');

    // Route untuk cart
    Route::get('/cart', function () {
        return view('cart');
    });
    Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart/view', [CartController::class,             'showCart'])->name('cart.view');
    Route::delete('/cart/{productId}', [CartController::class,   'removeFromCart'])->name('cart.remove');

    // Route untuk transaksi
    Route::get('/transaksion', [TransaksiController::class,         'index'])->name('transaksi.index');
    Route::get('/dashboard/transaksi', [TransaksiController::class, 'showAll'])->name('transaksi.showAll');

    // Route untuk detail produk

    // Route untuk shop

    // Route untuk logout
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/')->with('status', 'Anda berhasil logout');
    })->name('logout');

    // Route pembayaran
    // Route::post('/create-transaction', [PaymentController::class,        'createTransaction']);
    // Route::post('/store-pending-transaction', [PaymentController::class, 'storePendingTransaction']);
    Route::get('/transaksi', [PaymentController::class,      'index']);
    Route::get('/transaksi/{id}', [PaymentController::class, 'show']);
    Route::post('/transaksi', [PaymentController::class,     'store']);

    Route::post('/submit-payment-proof', [PaymentController::class, 'store']);
});

// Route dashboard khusus admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index', ['title' => 'Dashboard']);
    });
    Route::get('/dashboard/produk/add', function () {
        return view('dashboard.produk.add', ['title' => 'Tambah Produk']);
    });
    Route::get('/dashboard/produk', [ProductController::class,           'showProduct'])->name('dashboard.produk');
    Route::get('/dashboard/produk/create', [ProductController::class,    'create'])->name('products.create');
    Route::post('/dashboard/produk', [ProductController::class,          'store'])->name('products.store');
    Route::get('/products/{id}', [ProductController::class,              'show'])->name('products.show');
    Route::get('/dashboard/produk/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/dashboard/produk/{id}', [ProductController::class,      'update'])->name('products.update');
    Route::delete('/dashboard/produk/{id}', [ProductController::class,   'destroy'])->name('products.destroy');

    // Transaksi
    Route::put('/transaksi/{id}', [PaymentController::class,    'update']);
    Route::delete('/transaksi/{id}', [PaymentController::class, 'destroy'])->name('transaksi.destroy');

    Route::prefix('dashboard')->group(function () {
        Route::get('/kategori', [CategoryProductController::class,             'kategori_dashboard'])->name('dashboard.kategori.index');
        Route::get('/categories', [CategoryProductController::class,           'index'])->name('dashboard.category_products.index');
        Route::get('/categories/tambah', [CategoryProductController::class,    'create'])->name('dashboard.category_products.create');
        Route::post('/categories', [CategoryProductController::class,          'store'])->name('dashboard.category_products.store');
        Route::get('/categories/{id}/edit', [CategoryProductController::class, 'edit'])->name('dashboard.category_products.edit');
        Route::put('/categories/{id}', [CategoryProductController::class,      'update'])->name('dashboard.category_products.update');
        Route::delete('/categories/{id}', [CategoryProductController::class,   'destroy'])->name('dashboard.category_products.destroy');
    });
});
