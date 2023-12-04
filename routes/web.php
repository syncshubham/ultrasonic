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
Route::get('/admin/products/view', [AdminProductController::class, 'view_all_products'])->name('admin.products.view');
Route::get('/admin/product/create', [AdminProductController::class, 'create_product_view'])->name('create.productview');
Route::post('/admin/product/create', [AdminProductController::class, 'create_product'])->name('create.product');
Route::get('/admin/product/edit/{slug}', [AdminProductController::class, 'edit_product_view']);
Route::post('/admin/product/edit', [AdminProductController::class, 'edit_product'])->name('edit.product');
Route::post('/admin/product/destroy/{id}', [AdminProductController::class, 'destroy_product'])->name('product.destroy');
Route::post('/admin/product/status/{id}/{status}', [AdminProductController::class, 'update_product_status'])->name('product-update-status');



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