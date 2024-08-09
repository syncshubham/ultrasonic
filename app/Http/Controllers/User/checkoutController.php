<?php

namespace App\Http\Controllers\user;

use App\Models\Cart;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class checkoutController extends Controller
{
    public function mainCheckoutAndAdressSelection(Request $request)
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
        $addresses_count = $addresses->count();
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
            'addresses_count' => $addresses_count,
            'totalItems' => $totalItems,
            'totalAmount' => $totalAmount,
        ]);
    }

    public function addressSavingAndPaymentSelection(Request $request)
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

        // Check if the session variable 'checkout_token' is set
        if (!session()->has('checkout_token')) {
            return back()->withErrors(['error' => 'Session expired or invalid for proceed to address. Please try again.']);
        }

        $request->validate([
            'address_id' => 'required|exists:user_addresses,id'
        ]);

        $address = UserAddress::where('id', $request->address_id)
                          ->where('user_id', Auth::id())
                          ->first();

        if (!$address) {
            return back()->withErrors(['address_id' => 'The selected address is not valid.']);
        }

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

        session(['checkoutTokenPayment' => $__checkout_token]);
        session()->put('address_id', $address->id);

        return view('user.checkoutPayment', [
            'cartItems' => $cartItemsTransformed,
            'totalItems' => $totalItems,
            'totalAmount' => $totalAmount,
        ]);
    }


    public function paymentSavingAndFinalReview(Request $request)
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

        // Check if the session variable 'checkout_token' is set
        if (!session()->has('checkout_token') || !session()->has('checkoutTokenPayment')) {
            return back()->withErrors(['error' => 'Session expired or invalid for review and order placing ! Please try again.']);
        }

        $payment_id = $request->input('payment_id');

        $request->validate([
            'payment_id' => 'required|in:1',
        ]);
        
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

        session(['paymentAndReviewToken' => $__checkout_token]);
        session()->put('payment_id', $payment_id);

        echo "success";
        echo session('address_id');
        echo session('payment_id');
    }
}