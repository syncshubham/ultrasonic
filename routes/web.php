<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminProductController;
use Illuminate\Support\Facades\Route;

// Main website pages routes
Route::get('/', function () {
    return view('home');
});

// Admin panel dashboard routes
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']);

// Admin panel products routes
Route::get('/admin/products/view', [AdminProductController::class, 'view_all_products']);
Route::get('/admin/product/create', [AdminProductController::class, 'create_product_view'])->name('create.productview');
Route::post('/admin/product/create', [AdminProductController::class, 'create_product'])->name('create.product');
Route::get('/admin/product/edit/{slug}', [AdminProductController::class, 'edit_product']);
Route::post('/admin/product/update/{slug}', [AdminProductController::class, 'update_product']);

// Users/customers login routes
Route::middleware([
    'auth',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard'); 
});