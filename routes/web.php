<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminGeneralUsersController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\homePageController;
use Illuminate\Support\Facades\Route;

// Main website routes
Route::get('/', [homePageController::class, 'index']);

// Authenticated routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Admin panel routes
    // Start from here
    Route::group(['middleware' => 'isadmin'], function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        // Dashboard routes
        Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']);

        // Products routes
        Route::get('/admin/products/view', [AdminProductController::class, 'view_all_products'])->name('admin.products.view');
        Route::get('/admin/product/create', [AdminProductController::class, 'create_product_view'])->name('create.productview');
        Route::post('/admin/product/create', [AdminProductController::class, 'create_product'])->name('create.product');
        Route::get('/admin/product/edit/{slug}', [AdminProductController::class, 'edit_product_view']);
        Route::post('/admin/product/edit', [AdminProductController::class, 'edit_product'])->name('edit.product');
        Route::post('/admin/product/destroy/{id}', [AdminProductController::class, 'destroy_product'])->name('product.destroy');
        Route::post('/admin/product/status/{id}/{status}', [AdminProductController::class, 'update_product_status'])->name('product-update-status');
        // Ends at here

        // Users Controlling Routes
        Route::get('/admin/users/view', [AdminGeneralUsersController::class, 'view_all_users'])->name('admin.users.view');

    });

    Route::group(['middleware' => 'isuser'], function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
});

