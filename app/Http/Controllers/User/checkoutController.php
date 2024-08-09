<?php

namespace App\Http\Controllers\user;

use App\Models\Cart;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class checkoutController extends Controller
{
    public function main_checkout(Request $request)
    {
        $userId = Auth::id();
        $cartItems = Cart::with('product')
            ->where('user_id', $userId)
            ->get();
        
        $cartItems_count = $cartItems->count();
        $__checkout_token = $request->input('_token');
    
        if (!$__checkout_token || $cartItems_count <= 0) {
            return redirect()->route('product.cart')->with('error', 'Your cart is empty.');
        }
    
        // Store the token in the session
        session(['checkout_token' => $__checkout_token]);
    
        $addresses = UserAddress::where('user_id', $userId)->get();
    
        // Initialize totals
        $totalItems = 0;
        $totalAmount = 0;
    
        // Transform and calculate totals
        $cartItemsTransformed = $cartItems->map(function ($item) use (&$totalItems, &$totalAmount) {
            $quantity = $item->quantity;
            $finalPrice = $item->product->final_price;
    
            // Update totals
            $totalItems += $quantity;
            $totalAmount += $quantity * $finalPrice;
    
            return [
                'id' => $item->id,
                'product_id' => $item->product_id,
                'product_name' => $item->product->product_name,
                'size' => $item->size,
                'quantity' => $quantity,
                'image_1' => $item->product->image_1,
                'final_price' => $finalPrice,
            ];
        });
    
        return view('user.checkoutAddress', [
            'cartItems' => $cartItemsTransformed,
            'addresses' => $addresses,
            'totalItems' => $totalItems,
            'totalAmount' => $totalAmount,
        ]);
    }
    
}
