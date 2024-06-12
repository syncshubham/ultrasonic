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

    public function fetchCartFromDatabase($userId)
    {
        $cartItems = Cart::with('product')
            ->where('user_id', $userId)
            ->get();

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

        // Return response with additional total data
        return response()->json([
            'cartItems' => $cartItemsTransformed,
            'totalItems' => $totalItems,
            'totalAmount' => $totalAmount
        ]);
    }

    private function enrichCartDataWithProductNames($cartData)
    {
        // Extract product IDs from the combined key
        $productIds = array_map(function ($key) {
            return explode('|', $key)[0];
        }, array_keys($cartData));

        // Find products and key them by ID
        $products = Products::findMany($productIds)->keyBy('id');

        $enrichedCart = [];
        $totalItems = 0;
        $totalAmount = 0;

        foreach ($cartData as $combinedKey => $quantity) {
            // Split the combined key to get product ID and size
            list($productId, $size) = explode('|', $combinedKey);
            $product = $products->get($productId);

            if ($product) {
                $productName = $product->product_name;
                $productImage = $product->image_1;
                $productPrice = $product->final_price;
            } else {
                // Default values if product is not found
                $productName = 'Unknown Product';
                $productImage = 'no-image-available.png';
                $productPrice = 0;
            }

            // Calculate totals
            $totalItems += $quantity;
            $totalAmount += $quantity * $productPrice;

            $enrichedCart[] = [
                'product_id' => $productId,
                'product_name' => $productName,
                'size' => $size,
                'quantity' => $quantity,
                'image_1' => $productImage,
                'final_price' => $productPrice
            ];
        }

        // Return the enriched cart along with totals
        return response()->json([
            'cartItems' => $enrichedCart,
            'totalItems' => $totalItems,
            'totalAmount' => $totalAmount
        ]);
    }

    public function getCartItemsCount()
    {
        $cartCount = 0;

        if (Auth::check()) {
            // Fetch cart count from the database
            $cartCount = Cart::where('user_id', Auth::id())->sum('quantity');
        } else {
            // Fetch cart count from cookies
            $cart = request()->cookie('cart');
            $cartData = $cart ? json_decode($cart, true) : [];

            foreach ($cartData as $item => $quantity) {
                $cartCount += $quantity;
            }
        }

        return response()->json($cartCount);
    }

    public function deleteCartItem(Request $request)
    {
        $cartItemId = $request->input('cart_item_id');
        if (Auth::check()) {
            // Assuming $cartItemId is the ID from the database
            Cart::where('id', $cartItemId)->delete();
        } else {
            // Handle deletion from cookies
            $cart = json_decode(request()->cookie('cart'), true) ?? [];
            unset($cart[$cartItemId]); // Delete the item
            Cookie::queue('cart', json_encode($cart), 60 * 24 * 7);
        }
        return response()->json(['message' => 'Cart item removed successfully']);
    }

    public function getCartTotals()
    {
        if (Auth::check()) {
            // Calculate totals from the database
            return $this->getCartTotalsFromDatabase(Auth::id());
        } else {
            // Calculate totals from cookies
            return $this->getCartTotalsFromCookies();
        }
    }

    private function getCartTotalsFromDatabase($userId)
    {
        $cartItems = Cart::where('user_id', $userId)->get();
        $totalItems = $cartItems->sum('quantity');
        $totalAmount = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->final_price; // Assuming a relationship with a Product model
        });

        return response()->json([
            'totalItems' => $totalItems,
            'totalAmount' => $totalAmount
        ]);
    }

    private function getCartTotalsFromCookies()
    {
        $cart = json_decode(Cookie::get('cart'), true) ?? [];
        $totalItems = 0;
        $totalAmount = 0;

        foreach ($cart as $item => $quantity) {
            // Split item into id and size, or however your cookie cart items are identified
            list($productId, $size) = explode('|', $item);
            $product = Products::find($productId);

            if ($product) {
                $totalItems += $quantity;
                $totalAmount += $quantity * $product->final_price;
            }
        }

        return response()->json([
            'totalItems' => $totalItems,
            'totalAmount' => $totalAmount
        ]);
    }


}
