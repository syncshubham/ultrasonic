<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\admin\Products;

class homePageController extends Controller
{
    public function index()
    {
        $products = Products::where('status', 1)->orderBy("created_at", "desc")->get();
        $productCount = $products->count();

        $wishlistProductIds = [];
        if (Auth::check()) {
            $wishlistProductIds = Auth::user()->wishlist()->pluck('product_id')->toArray();
        }

        // Add is_wished flag and alt attributes for image columns based on user's wishlist
        $products = $products->map(function ($product) use ($wishlistProductIds) {
            $product->is_wished = in_array($product->id, $wishlistProductIds);

            // Process each image column to set the alt attribute
            for ($i = 1; $i <= 5; $i++) {
                $imageColumn = "image_$i";
                if (!empty($product->$imageColumn)) {
                    $filename = pathinfo($product->$imageColumn, PATHINFO_FILENAME);
                    $product->{"alt_$imageColumn"} = $filename;
                } else {
                    $product->{"alt_$imageColumn"} = "default-alt-text"; // Optional: default text if no image
                }
            }

            return $product;
        });

        return view('home', compact('products', 'productCount', 'wishlistProductIds'));
    }


    public function products()
    {
        $products = Products::where('status', 1)->orderBy("created_at", "desc")->get();
        $productCount = $products->count();

        $wishlistProductIds = [];
        if (Auth::check()) {
            $wishlistProductIds = Auth::user()->wishlist()->pluck('product_id')->toArray();
        }

        // Add is_wished flag and alt attributes for image columns based on user's wishlist
        $products = $products->map(function ($product) use ($wishlistProductIds) {
            $product->is_wished = in_array($product->id, $wishlistProductIds);

            // Process each image column to set the alt attribute
            for ($i = 1; $i <= 5; $i++) {
                $imageColumn = "image_$i";
                if (!empty($product->$imageColumn)) {
                    $filename = pathinfo($product->$imageColumn, PATHINFO_FILENAME);
                    $product->{"alt_$imageColumn"} = $filename;
                } else {
                    $product->{"alt_$imageColumn"} = "default-alt-text"; // Optional: default text if no image
                }
            }

            return $product;
        });

        return view('products', compact('products', 'productCount', 'wishlistProductIds'));
    }

    public function blogs()
    {
        return view("blogs");
    }


    public function view_product_detail($id, $slug)
    {
        $product = Products::where('id', $id)->where('status', 1)->first();

        if ($product) {
            if ($product->status == 0) {
                return "Unauthorised Access";
            } else {
                $meta_name = $product->product_name;
                $userName = Auth::check() ? Auth::user()->name : null; // Fetch the logged-in user's name if available

                // Check if the product is in the user's wishlist
                $is_wished = false;
                if (Auth::check()) {
                    $is_wished = Auth::user()->wishlist()->where('product_id', $product->id)->exists();
                }
                $product->is_wished = $is_wished;

                // Generate alt attributes for image columns
                for ($i = 1; $i <= 5; $i++) {
                    $imageColumn = "image_$i";
                    if (!empty($product->$imageColumn)) {
                        $filename = pathinfo($product->$imageColumn, PATHINFO_FILENAME);
                        $product->{"alt_$imageColumn"} = $filename;
                    } else {
                        $product->{"alt_$imageColumn"} = "default-alt-text"; // Optional: default text if no image
                    }
                }

                return view("productdetail", compact("product", "meta_name", "userName"));
            }
        } else {
            return "Unauthorised Access";
        }
    }


}