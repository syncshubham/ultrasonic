<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homePageController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\checkoutController;
use App\Http\Controllers\User\wishlistController;
use App\Http\Controllers\admin\AdminOrdersController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\User\userMainProfileController;
use App\Http\Controllers\admin\AdminGeneralUsersController;

// ----- 1.) Begin - Main website routes
// ---- 1.1) Begin - static page routes

Route::get('about', function () {
    return view('about');
})->name('about');
Route::get('termsandconditions', function () {
    return view('termsandconditions');
})->name('termsandconditions');
Route::get('privacypolicies', function () {
    return view('privacypolicies');
})->name('privacypolicies');
Route::get('refundandcancellationpolicies', function () {
    return view('refundandcancellationpolicies');
})->name('refundandcancellationpolicies');
Route::get('contact-us', function () {
    return view('contactUs');
})->name('contact-us');
Route::get('coming-soon', function () {
    return view('comingsoon');
})->name('coming-soon');

Route::get('blogs/Best-Affordable-Bluetooth-Hearing-Aids-in-2024', function () {
    return view('blog1');
})->name('blog1');


Route::get('blogs/Bluetooth-Hearing-Aids-vs-Bluetooth-Earbuds', function () {
    return view('blog2');
})->name('blog2');

Route::get('blogs/5-Important-Things-to-Look-For-When-Buying-Affordable-Hearing-Aids', function () {
    return view('blog3');
})->name('blog3');


Route::get('blogs/Rising-Hearing-Loss-in-Young-Adults', function () {
    return view('blog4');
})->name('blog4');


//testing cookie
Route::get('/test-cookie', function () {
    $cart = Cookie::get('cart');
    $cartData = json_decode($cart, true);
    return response()->json($cartData);
});



Route::group(['middleware' => 'non_admin'], function () {

    Route::get('/', [homePageController::class, 'index']);

    Route::get('products', [homePageController::class, 'products'])->name('products');
    Route::get('blogs', [homePageController::class, 'blogs'])->name('blogs');

    // ---- 1.1) End - static page routes

    // ---- 1.2) Begin - dynamic pages route
    Route::get('/viewproduct/{id}/{slug}', [homePageController::class, 'view_product_detail'])->name('onepagerview.product');
    // ---- 1.2) End - dynamic pages route

    // ----- 1.) End - Main website routes


    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
    Route::get('/api/cart', [CartController::class, 'getCartData']);
    Route::get('/api/cart/count', [CartController::class, 'getCartItemsCount']);
    Route::post('/delete-cart-item', [CartController::class, 'deleteCartItem'])->name('delete-cart-item');
    Route::get('/api/cart-totals', [CartController::class, 'getCartTotals']);
    Route::get('/product/cart', [CartController::class, 'productCart'])->name("product.cart");
    Route::post('/delete-cart-products', [CartController::class, 'deleteCartProducts'])->name('delete-cart-products');
    Route::post('/wishlist-toggle', [wishlistController::class, 'toggle'])->name('wishlist-toggle');
    Route::get('/product/cart', [CartController::class, 'productCart'])->name("product.cart");

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

        Route::get('/admin/orders', [AdminOrdersController::class, 'viewOrders'])->name('admin.orders');
        Route::get('/admin/orders/update/{slug}', [AdminOrdersController::class, 'modify_order']);
        Route::post('/admin/orders/update', [AdminOrdersController::class, 'updateOrderStatus'])->name('update.order');

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
        Route::post('/main/checkout', [checkoutController::class, 'mainCheckoutAndAdressSelection'])->name('main.checkout');
        Route::get('/user-dashboard', [userMainProfileController::class, 'user_dashboard'])->name('user.dashboard');
        Route::get('/user-orders', [userMainProfileController::class, 'user_orders'])->name('user.orders');
        Route::get('/user-addresses', [userMainProfileController::class, 'user_addresses'])->name('user.addresses');
        Route::get('/user-paymentmethods', [userMainProfileController::class, 'user_paymentMethods'])->name('user.paymentmethods');
        Route::get('/user-profile', [userMainProfileController::class, 'user_profile'])->name('user.profile');
        Route::get('/add-address', [userMainProfileController::class, 'add_address'])->name('add.address');
        Route::post('/create-address', [userMainProfileController::class, 'create_address'])->name('create.address');
        Route::get('/address/{id}/edit', [userMainProfileController::class, 'address_edit'])->name('address.edit');
        Route::post('/address/{id}/update', [userMainProfileController::class, 'address_update'])->name('address.update');
        Route::post('/address/{id}/delete', [userMainProfileController::class, 'address_delete'])->name('address.delete');
        Route::post('/select-address', [checkoutController::class, 'addressSavingAndPaymentSelection'])->name('select.address');
        Route::post('/select-payment', [checkoutController::class, 'paymentSavingAndFinalReview'])->name('select.payment');
        Route::post('/order-confirmation', [checkoutController::class, 'orderConfirmation'])->name('place.order');

        Route::get('/wishlist-data', [wishlistController::class, 'getData'])->name('wishlist-data');
        Route::get('/user/orders/update/{slug}', [userMainProfileController::class, 'modify_order']);
        Route::post('/order/cancel', [userMainProfileController::class, 'cancelOrder'])->name('order.cancel');
        Route::get('/track-order', [userMainProfileController::class, 'trackOrder'])->name('track-order');
        Route::get('/track-order-number', [userMainProfileController::class, 'trackOrderNumber'])->name('track-order-number');
    });
    // ---- 2.2) End - User panel routes    
});

// ----- 2.) End - Authenticated routes


