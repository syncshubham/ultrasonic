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

        return view("home", compact("products", "productCount"));
    }
    

    public function view_product_detail($id)
    {
        $product = Products::where('id', $id)->where('status', 1)->first();
        if($product)
        {
            if($product->status == 0){
                return "Unauthorised Access";
            }else{
                $meta_name = $product->product_name;
                $userName = Auth::check() ? Auth::user()->name : null; // Fetch the logged-in user's name if available
                return view("productdetail", compact("product", "meta_name"));
            }
        }else{
            return "Unauthorised Access";
        }
    }
}