<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class checkoutController extends Controller
{
    public function main_checkout(Request $request)
    {
        dd($request->all());
    }
}
