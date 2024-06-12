<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // Defining a view composer for the header
        View::composer('layouts.main', function ($view) {
            // Passing the variable to the view
            $cartCount = 0;
    
            if (Auth::check()) {
                // Fetch cart count from the database
                $cartCount = Cart::where('user_id', Auth::id())->sum('quantity');
            } else {
                // Fetching cart count from cookies
                $cart = request()->cookie('cart');
                $cartData = $cart ? json_decode($cart, true) : [];
        
                foreach ($cartData as $item => $quantity) {
                    $cartCount += $quantity;
                }
            }

            $userName = Auth::check() ? Auth::user()->name : null;
            $view->with(['cart' => $cartCount,
                        'userName' => $userName]);
        });
    }
}
