<?php

namespace App\Http\Controllers\user;

use App\Models\Cart;
use App\Models\UserOrder;
use App\Models\UserAddress;
use Illuminate\Support\Str;
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
                'short_desc' => $item->product->short_desc,
            ];
        });

        session(['paymentAndReviewToken' => $__checkout_token]);
        session()->put('payment_id', $payment_id);

        $addressId = session('address_id');
        $paymentId = session('payment_id');

        $address = UserAddress::where('id', $addressId)
            ->where('user_id', Auth::id())
            ->first();

        return view('user.checkoutReview', [
            'cartItems' => $cartItemsTransformed,
            'totalItems' => $totalItems,
            'totalAmount' => $totalAmount,
            'paymentId' => $paymentId,
            'address' => $address,
        ]);

    }

    public function orderConfirmation(Request $request)
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

        // Check if the session variables for checkout are set
        if (!session()->has('checkout_token') || !session()->has('checkoutTokenPayment') || !session()->has('paymentAndReviewToken')) {
            return back()->withErrors(['error' => 'Session expired or invalid for review and order placing! Please try again.']);
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
                'product_id' => $item->product_id,
                'size' => $item->size,
                'quantity' => $quantity,
                'final_price' => $finalPrice,
            ];
        });

        // Convert the transformed cart items to JSON format for storage
        $productDetailsJson = $cartItemsTransformed->toJson();

        // Retrieve address_id and payment_id from session
        $addressId = session('address_id');
        $address = UserAddress::find($addressId);
        if (!$address) {
            return back()->withErrors(['error' => 'Address not found']);
        }

        $formattedAddress = $address->address_first_line . ', ' .
        ($address->address_second_line ? $address->address_second_line . ', ' : '') .
        $address->city . ', ' .
        $address->state . ', ' .
        $address->country . ', ' .
        $address->pin_code;
        
        $paymentId = session('payment_id');
        $orderId = 'ORD' . strtoupper(Str::random(15));
        // Create a new order
        $order = new UserOrder();
        $order->user_id = $userId;
        $order->product_details = $productDetailsJson;
        $order->address_id = $addressId;
        $order->address = $formattedAddress;
        $order->payment_id = $paymentId;
        $order->total_items = $totalItems;
        $order->total_amount = $totalAmount;
        $order->order_id = $orderId;
        $order->save();

        // Optionally, clear the cart after placing the order
        Cart::where('user_id', $userId)->delete();
        session()->forget(['checkout_token', 'checkoutTokenPayment', 'paymentAndReviewToken', 'address_id','payment_id']);

        return view('user.orderConfirmation', [
            'orderId' => $orderId
        ]);
    }

}