<?php

namespace App\Http\Controllers\user;

use App\Models\UserOrder;
use App\Models\UserAddress;
use Illuminate\Http\Request;
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
}