<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminProductController;

// 🌐 Public Landing Page
Route::get('/', function () {
    return view('welcome');
});

// 🛍️ User Dashboard (Shop)
Route::get('/dashboard', [ProductController::class, 'dashboard'])
    ->middleware(['auth'])
    ->name('dashboard');

// 👤 Profile Routes (Authenticated Users)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🛒 Product Routes (Public)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('products.show');


// 🛒 Cart Routes
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::patch('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');

// 💳 Checkout Routes
Route::post('/checkout', [CheckoutController::class, 'store'])
    ->middleware('auth')
    ->name('checkout.store');

Route::get('/order/received', function () {
    return view('cart.received');
})->middleware('auth')->name('order.received');

// 🔐 Admin Login
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);

// 🛠️ Admin Panel (Protected)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // 🧰 Product Management
    Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');

    //Customer Management
    Route::get('/customers', [AdminCustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/create', [AdminCustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers', [AdminCustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/{customer}/edit', [AdminCustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{customer}', [AdminCustomerController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{customer}', [AdminCustomerController::class, 'destroy'])->name('customers.destroy');
});

// 🧩 Laravel Auth Scaffolding
require __DIR__.'/auth.php';