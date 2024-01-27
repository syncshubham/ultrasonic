<?php

namespace App\Http\Controllers;

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
}