<?php

use App\Http\Controllers\Customers\CartController;
use App\Http\Controllers\Customers\CheckoutController;
use App\Http\Controllers\Customers\HistoryController;
use App\Http\Controllers\Customers\HomeController;
use App\Http\Controllers\Customers\ProductController;
use App\Http\Controllers\Staff\CategoryController;
use App\Http\Controllers\Staff\CustomerController;
use App\Http\Controllers\Staff\DashboardController;
use App\Http\Controllers\Staff\JenisController;
use App\Http\Controllers\Staff\TipeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['as' => 'homepage.'], function () {
    Route::get('/shop', [ProductController::class, 'index'])->name('shop');
    Route::get('/detail-product/{id}', [ProductController::class, 'detail']);
});

Route::middleware(['auth'])->group(function () {
    Route::group(['as' => 'cart.'], function () {
        Route::get('/cart', [CartController::class, 'index'])->name('index');
        Route::post('/add-to-cart/{id}', [CartController::class, 'addCart'])->name('add');
        Route::get('/remove-from-cart/{id}', [CartController::class, 'index'])->name('remove');
    });
    Route::group(['as' => 'checkout.'], function () {
        Route::post('/checkout', [CheckoutController::class, 'index'])->name('index');
        Route::post('/checkout-data', [CheckoutController::class, 'store'])->name('store');
    });
    Route::group(['as' => 'history.'], function () {
        Route::get('/riwayat-order', [HistoryController::class, 'index'])->name('index');
        Route::get('/riwayat-detail/{id}', [HistoryController::class, 'detail'])->name('detail');
    });
    Route::group(['as' => 'customers.'], function () {
        Route::get('/data-customer', [CustomerController::class, 'index']);
        Route::get('/create-customer', [CustomerController::class, 'create'])->name('create');
        Route::get('/edit-customer/{id}', [CustomerController::class, 'edit'])->name('edit');
        Route::post('/store-customer', [CustomerController::class, 'store'])->name('store');
        Route::put('/update-customer/{id}', [CustomerController::class, 'update'])->name('update');
        Route::get('/delete-customer/{id}', [CustomerController::class, 'destroy'])->name('delete');
    });
    Route::group(['as' => 'categories.'], function () {
        Route::get('/data-category', [CategoryController::class, 'index']);
        Route::get('/create-category', [CategoryController::class, 'create'])->name('create');
        Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/store-category', [CategoryController::class, 'store'])->name('store');
        Route::put('/update-category/{id}', [CategoryController::class, 'update'])->name('update');
        Route::get('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('delete');
    });
    Route::group(['as' => 'jenis.'], function () {
        Route::get('/data-jenis', [JenisController::class, 'index']);
        Route::get('/create-jenis', [JenisController::class, 'create'])->name('create');
        Route::get('/edit-jenis/{id}', [JenisController::class, 'edit'])->name('edit');
        Route::post('/store-jenis', [JenisController::class, 'store'])->name('store');
        Route::put('/update-jenis/{id}', [JenisController::class, 'update'])->name('update');
        Route::get('/delete-jenis/{id}', [JenisController::class, 'destroy'])->name('delete');
    });
    Route::group(['as' => 'tipe.'], function () {
        Route::get('/data-tipe', [TipeController::class, 'index']);
        Route::get('/create-tipe', [TipeController::class, 'create'])->name('create');
        Route::get('/edit-tipe/{id}', [TipeController::class, 'edit'])->name('edit');
        Route::post('/store-tipe', [TipeController::class, 'store'])->name('store');
        Route::put('/update-tipe/{id}', [TipeController::class, 'update'])->name('update');
        Route::get('/delete-tipe/{id}', [TipeController::class, 'destroy'])->name('delete');
    });
    Route::group(['as' => 'staff.'], function () {
        Route::get('/data-product', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/create-product', [DashboardController::class, 'create'])->name('create');
        Route::get('/edit-product/{id}', [DashboardController::class, 'edit'])->name('edit');
        Route::post('/store-product', [DashboardController::class, 'store'])->name('store');
        Route::put('/update-product/{id}', [DashboardController::class, 'update'])->name('update');
        Route::get('/delete-product/{id}', [DashboardController::class, 'destroy'])->name('delete');
    });
});

require __DIR__ . '/auth.php';
