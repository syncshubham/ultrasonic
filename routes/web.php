<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homePageController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminGeneralUsersController;

// ----- 1.) Begin - Main website routes
    // ---- 1.1) Begin - static page routes
    Route::get('/', [homePageController::class, 'index']);
    // ---- 1.1) End - static page routes

    // ---- 1.2) Begin - dynamic pages route
    Route::get('/product/view/{id}', [homePageController::class, 'view_product_detail'])->name('onepagerview.product');
    // ---- 1.2) End - dynamic pages route

// ----- 1.) End - Main website routes


Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('/api/cart', [CartController::class, 'getCartData']);


//testing cookie
Route::get('/test-cookie', function () {
    $cart = Cookie::get('cart');
    $cartData = json_decode($cart, true);
    return response()->json($cartData);
});

// ----- 2.) Begin - Authenticated routes
// this is the middleware wrapped around all routes which requires logged in user
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // ---- 2.1) Begin - Admin panel routes
    Route::group(['middleware' => 'isadmin'], function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        
        // --- 2.1.1) Begin - Admin Dashboard routes
        Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']);
        // --- 2.1.1) End - Admin Dashboard routes


        // --- 2.1.2) Begin - Admin Products management routes
        Route::get('/admin/products/view', [AdminProductController::class, 'view_all_products'])->name('admin.products.view');
        Route::get('/admin/product/create', [AdminProductController::class, 'create_product_view'])->name('create.productview');
        Route::post('/admin/product/create', [AdminProductController::class, 'create_product'])->name('create.product');
        Route::get('/admin/product/edit/{slug}', [AdminProductController::class, 'edit_product_view']);
        Route::post('/admin/product/edit', [AdminProductController::class, 'edit_product'])->name('edit.product');
        Route::post('/admin/product/destroy/{id}', [AdminProductController::class, 'destroy_product'])->name('product.destroy');
        Route::post('/admin/product/status/{id}/{status}', [AdminProductController::class, 'update_product_status'])->name('product-update-status');
        // --- 2.1.2) End -  Products management routes


        // --- 2.1.3) Begin - Admin panel Users Management Routes
        Route::get('/admin/users/view', [AdminGeneralUsersController::class, 'view_all_users'])->name('admin.users.view');
        Route::post('/admin/user/destroy/{id}', [AdminGeneralUsersController::class, 'destroy_user'])->name('user.destroy');
        // --- 2.1.3) End - Admin panel Users Management Routes


    });
    // ---- 2.1) End - Admin panel routes

    
    // ---- 2.2) Begin - User panel routes
    Route::group(['middleware' => 'isuser'], function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
    // ---- 2.2) End - User panel routes


});

// ----- 2.) End - Authenticated routes


