<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\admin\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'size' => 'required|in:' . $this->getProductSizes($request->input('product_id')),
        ]);
    
        $productId = $validated['product_id'];
        $quantity = $validated['quantity'];
        $size = $validated['size'];
        try {
         
            
            if (Auth::check()) {
                Cart::updateOrCreate(
                    ['user_id' => Auth::id(), 'product_id' => $productId, 'size' => $size],
                    ['quantity' => \DB::raw('COALESCE(quantity,0) + ' . intval($quantity))]
                );
            } else {
                $cart = json_decode(Cookie::get('cart'), true) ?? [];
                $cartKey = $productId . '|' . $size;
                if (isset($cart[$cartKey])) {
                    $cart[$cartKey] += $quantity;
                } else {
                    $cart[$cartKey] = $quantity;
                }
                Cookie::queue('cart', json_encode($cart), 60 * 24 * 7);
            }
            return response()->json(['message' => 'Product added to cart successfully']);
        } catch (\Exception $e) {
            Log::error('Error adding product to cart: ' . $e->getMessage());
            return response()->json(['errormessage' => 'An error occurred while adding the product to the cart. Please try again later.'], 500);
        }
    }
    
    private function getProductSizes($productId)
    {
        $product = Products::find($productId);
        return $product ? $product->sizes : '';  // assuming 'sizes' is a comma-separated field or similar
    }
    

    public function getCartData(Request $request)
    {
        if (Auth::check()) {
            // User is logged in, fetch from database
            $userId = Auth::id();
            $cartData = $this->fetchCartFromDatabase($userId);
        } else {
            // User is not logged in, fetch from cookies
            $cartData = json_decode($request->cookie('cart', '[]'), true);
            $cartData = $this->enrichCartDataWithProductNames($cartData);
            // echo $cartData;
        }

        return response()->json($cartData);
    }

    private function fetchCartFromDatabase($userId)
    {
        // Fetch cart data from database based on user ID
        // This is a placeholder: Implement the actual database retrieval logic here
        return Cart::where('user_id', $userId)->get();
    }

    private function enrichCartDataWithProductNames($cartData)
    {
        $productIds = array_keys($cartData);
        $products = Products::findMany($productIds)->keyBy('id');

        $enrichedCart = [];
        foreach ($cartData as $productId => $quantity) {
            $productName = $products->has($productId) ? $products[$productId]->product_name : 'Unknown Product';
            $enrichedCart[] = [
                'product_id' => $productId,
                'product_name' => $productName,
                'quantity' => $quantity
            ];
        }
        return $enrichedCart;
    }
    
}
