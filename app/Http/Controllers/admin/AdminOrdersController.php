<?php

namespace App\Http\Controllers\admin;

use App\Models\UserOrder;
use Illuminate\Http\Request;
use App\Models\admin\Products;
use App\Http\Controllers\Controller;

class AdminOrdersController extends Controller
{
    public function viewOrders()
    {
        // Eager load related user, products, and address data
        $orders = UserOrder::with(['user', 'address'])
            ->orderBy("created_at", "desc")
            ->get();

        $orderscount = $orders->count();

        return view("admin.orders", compact("orders", "orderscount"));
    }

    public function modify_order($id)
    {
        $order = UserOrder::where('order_id', '=', $id)->with('user')->firstOrFail();
        $productDetails = json_decode($order->product_details, true);

        foreach ($productDetails as &$product) {
            $productInfo = Products::find($product['product_id']);
            $product['product_name'] = $productInfo->product_name;
            $product['image_1'] = $productInfo->image_1;
        }

        $order->product_details = json_encode($productDetails);
        return view("admin.updateOrders", compact("order", "productDetails"));
    }

    public function updateOrderStatus(Request $request)
    {
        $order = UserOrder::where('order_id', $request->order_id)->firstOrFail();

        // Custom validation rules
        if($request->payment_status)
        {
            $request->validate([
                'order_status' => ['required', 'in:Placed,Confirmed,processing,Shipped,Delivered'],
                'payment_status' => ['required', 'in:Pending,Paid'],
            ]);
        if ($request->order_status === 'Delivered' && $request->payment_status !== 'Paid') {
            return back()->withErrors(['order_status' => 'Order status can only be set to "Delivered" if the payment status is "Paid".']);
        }

        $order->order_status = $request->order_status;
        $order->payment_status = $request->payment_status;
        $order->save();

        return redirect()->back()->with('success', 'Order updated successfully.');
        }else{
            $request->validate([
                'order_status' => ['required', 'in:Placed,Confirmed,processing,Shipped,Delivered'],
            ]);

            $order->order_status = $request->order_status;
            $order->save();
    
            return redirect()->back()->with('success', 'Order updated successfully.');
        }

     
    }

}
