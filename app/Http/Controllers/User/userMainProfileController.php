<?php

namespace App\Http\Controllers\user;

use App\Models\UserOrder;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Models\admin\Products;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class userMainProfileController extends Controller
{
    public function user_profile()
    {
        return view('user.mainUserProfile');
    }

    public function user_orders()
    {
        $userId = Auth::id();
        $orders = UserOrder::where('user_id', $userId)->get();
        return view('user.userOrders', compact('orders'));
    }

    public function user_addresses()
    {
        $user_id = auth()->id();
        $addresses = UserAddress::where('user_id', $user_id)->get();
        $address_count = $addresses->count();

        return view('user.userAddresses', [
            'addresses' => $addresses,
            'address_count' => $address_count
        ]);
    }

    public function create_address(Request $request)
    {
        $request->validate([
            'address_first_line' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'pin_code' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'address_second_line' => 'nullable|string|max:255'
        ]);

        $address = new UserAddress([
            'user_id' => Auth::id(),
            'address_first_line' => $request->address_first_line,
            'address_second_line' => $request->address_second_line,
            'city' => $request->city,
            'pin_code' => $request->pin_code,
            'country' => $request->country,
        ]);

        $address->save();

        return redirect()->route('user.addresses');
    }

    public function address_edit($id)
    {
        $address = UserAddress::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('user.editUserAddresses', ['addresses' => $address]);
    }

    public function address_update(Request $request, $id)
    {
        $request->validate([
            'address_first_line' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'pin_code' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'address_second_line' => 'nullable|string|max:255'
        ]);

        $address = UserAddress::find($id);
        if (!$address || $address->user_id != Auth::id()) {
            return redirect()->back()->withErrors(['error' => 'Invalid address or permission denied']);
        }

        $address->address_first_line = $request->address_first_line;
        $address->address_second_line = $request->address_second_line;
        $address->city = $request->city;
        $address->pin_code = $request->pin_code;
        $address->country = $request->country;

        $address->save();

        return redirect()->route('user.addresses')->with('success', 'Address updated successfully');
    }


    public function address_delete($id)
    {
        $address = UserAddress::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $address->delete();

        return redirect()->route('user.addresses');
    }

    public function add_address()
    {
        return view('user.addMoreAddresses');

    }
    public function user_paymentMethods()
    {
        return view('user.paymentMethods');
    }
    public function user_dashboard()
    {
        $user = Auth::user();
        return view('user.dashboard', ['userName' => $user->name]);
    }

    public function modify_order($id)
    {
        $userId = Auth::id();
        $order = UserOrder::where('order_id', '=', $id)->where('user_id', Auth::id())->with('user')->firstOrFail();
        $productDetails = json_decode($order->product_details, true);

        foreach ($productDetails as &$product) {
            $productInfo = Products::find($product['product_id']);
            $product['product_name'] = $productInfo->product_name;
            $product['image_1'] = $productInfo->image_1;
            $product['short_desc'] = $productInfo->short_desc;
        }

        $order->product_details = json_encode($productDetails);
        return view("user.updateOrders", compact("order", "productDetails"));
    }

    public function cancelOrder(Request $request)
    {
        $userId = Auth::id();
        $order = UserOrder::where('order_id', $request->order_id)->where('user_id', Auth::id())->firstOrFail();

        if ($order->payment_status === 'Paid' || $order->order_status === 'Delivered' || $order->order_status === 'Shipped') {
            return back()->withErrors(['order_status' => 'Order cannot be cancelled because it is already delivered/paid or in shipping process.']);
        }

        // Update order status and payment status to "Cancelled"
        $order->order_status = 'Cancelled';
        $order->payment_status = 'Cancelled';
        $order->save();

        return redirect()->route('user.orders')->with('success', 'Order has been cancelled successfully.');
    }

    public function trackOrder()
    {
        return view("user.trackOrders");
    }

    public function trackOrderNumber(Request $request)
    {
        $orderId = $request->input('order_id');
        $userId = Auth::id();

        // Attempt to find the order or return with an error
        $order = UserOrder::where('order_id', $orderId)
            ->where('user_id', $userId)
            ->with('user')
            ->first();

        if (!$order) {
            return back()->withErrors(['order_id' => 'The order ID you are trying to search for is not found or does not belongs to you.']);
        }

        // Decode the product details and fetch additional product information
        $productDetails = json_decode($order->product_details, true);

        foreach ($productDetails as &$product) {
            $productInfo = Products::find($product['product_id']);
            $product['product_name'] = $productInfo->product_name;
            $product['image_1'] = $productInfo->image_1;
            $product['short_desc'] = $productInfo->short_desc;
        }

        // Encode the updated product details back to JSON
        $order->product_details = json_encode($productDetails);

        return view("user.updateOrders", compact("order", "productDetails"));
    }

}