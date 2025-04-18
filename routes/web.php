<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Shop\CartController;
use App\Http\Controllers\Shop\HomeController;
use App\Http\Controllers\Shop\CheckoutController;
use App\Http\Controllers\Admin\OrderController;

Route::name('shop.')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home.index');
    Route::get('category/{category}', [\App\Http\Controllers\Shop\CategoryController::class, 'show'])->name('category.show');
    Route::get('product/{product}', [\App\Http\Controllers\Shop\ProductController::class, 'show'])->name('product.show');

    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::post('cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('cart/clear', [CartController::class, 'clear'])->name('cart.clear');

    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('checkout', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('thank-you', [CheckoutController::class, 'thankYou'])->name('checkout.thankyou');
});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('login', [LoginController::class, 'create'])->name('login');
        Route::post('login', [LoginController::class, 'store'])->name('login');
    });

    Route::middleware('auth')->group(function () {
        Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
        Route::get('', [DashboardController::class, 'index'])->name('dashboard.index');

        Route::resource('orders', OrderController::class)->only(['index', 'show', 'destroy']);
        Route::resource('categories', CategoryController::class)->except(['show']);
        Route::resource('products', ProductController::class)->except(['show']);
        Route::resource('pages', PageController::class)->except(['show']);
        Route::resource('users', UserController::class)->except(['show']);

        Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});
