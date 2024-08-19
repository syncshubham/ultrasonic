<?php

namespace App\Http\Controllers\user;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class wishlistController extends Controller
{
    public function toggle(Request $request)
{
    if (!Auth::check()) {
        return response()->json(['status' => 'redirect', 'url' => route('login')]);
    }

    $userId = Auth::id();
    $productId = $request->input('productId');
    $size = $request->input('size');

    // Assuming you have a Wishlist model set up appropriately
    $exists = Wishlist::where('product_id', $productId)
                      ->where('user_id', $userId)
                      ->where('size', $size)
                      ->first();

    if ($exists) {
        $exists->delete();
        $wished = false;
    } else {
        Wishlist::create([
            'product_id' => $productId,
            'user_id' => $userId,
            'size' => $size
        ]);
        $wished = true;
    }

    return response()->json(['status' => 'ok', 'wished' => $wished]);
}

public function getData()
{
    
}
}
