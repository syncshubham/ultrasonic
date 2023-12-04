<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\AtLeastOneRequired;
use App\Models\admin\Products;
use File;

class AdminProductController extends Controller
{
    public function view_all_products()
    {
        $products = Products::orderBy("created_at", "desc")->get();
        return view("admin.products.view-all", compact("products"));
    }

    public function create_product_view()
    {
        return view("admin.products.create");
    }

    public function create_product(Request $request)
    {
        // Validate the request data
        $this->validate(
            $request,
            [
                'product_name' => 'required|regex:/^[A-Za-z0-9\s]+$/',
                'sizes' => ['required', new AtLeastOneRequired()],
                'unit' => 'required|string',
                'short_desc' => 'required',
                'image_1' => 'required|mimes:jpeg,png,jpg|max:150',
                'image_2' => 'nullable|mimes:jpeg,png,jpg|max:150',
                'image_3' => 'nullable|mimes:jpeg,png,jpg|max:150',
                'image_4' => 'nullable|mimes:jpeg,png,jpg|max:150',
                'image_5' => 'nullable|mimes:jpeg,png,jpg|max:150',
                'price' => 'required|numeric',
                'disc_rate' => 'required|numeric',
                'disc_price' => 'required|numeric',
                'final_price' => 'required|numeric',
            ],
            [
                'sizes.required' => 'Kindly check at least one of the above checkboxes.',
                'product_name.regex' => 'Symbols not allowed',
            ]
        );

        $product = new Products;
        $product->product_name = $request->input('product_name');
        $product->unit = $request->input('unit');
        $product->exchangeable = $request->input('exchangeable');
        $product->refundable = $request->input('refundable');
        $product->sizes = implode(',', $request->input('sizes'));
        $product->short_desc = $request->input('short_desc');
        $product->more_details = $request->input('more_details');
        $product->bulletin_1 = $request->input('bulletin_1');
        $product->bulletin_2 = $request->input('bulletin_2');
        $product->bulletin_3 = $request->input('bulletin_3');
        $product->bulletin_4 = $request->input('bulletin_4');
        $product->bulletin_5 = $request->input('bulletin_5');
        $product->price = $request->input('price');
        $product->disc_rate = $request->input('disc_rate');
        $product->disc_price = $request->input('disc_price');
        $product->final_price = $request->input('final_price');
        $product->status = 1;

        // Setting the number of images that are need to handle
        $numberOfImages = 5;

        for ($i = 1; $i <= $numberOfImages; $i++) {
            $fieldName = 'image_' . $i;
            if ($request->file($fieldName)) {
                $file = $request->file($fieldName);
                $uniqueName = uniqid() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('adminassets/uploads/images/products');
                $viewImage = 'adminassets/uploads/images/products/';
                $filename = $viewImage . $uniqueName;
                $file->move($destinationPath, $filename);
                $product->$fieldName = $filename;
            }
        }

        $product->save();

        return redirect()->route('create.productview')
            ->with('success', 'Task done.');
    }


    public function edit_product_view($id)
    {
        $product = Products::where('id', '=', $id)->firstOrFail();
        return view("admin.products.edit", compact("product"));
    }

    public function edit_product(Request $request)
    {
        $id = $request->input('id');
        $product = Products::where('id', '=', $id)->firstOrFail();

        // Validate the request data
        $this->validate(
            $request,
            [
                'product_name' => 'required|regex:/^[A-Za-z0-9\s]+$/',
                'sizes' => ['required', new AtLeastOneRequired()],
                'unit' => 'required|string',
                'short_desc' => 'required',
                'image_1' => 'nullable|mimes:jpeg,png,jpg|max:150',
                'image_2' => 'nullable|mimes:jpeg,png,jpg|max:150',
                'image_3' => 'nullable|mimes:jpeg,png,jpg|max:150',
                'image_4' => 'nullable|mimes:jpeg,png,jpg|max:150',
                'image_5' => 'nullable|mimes:jpeg,png,jpg|max:150',
                'price' => 'required|numeric',
                'disc_rate' => 'required|numeric',
                'disc_price' => 'required|numeric',
                'final_price' => 'required|numeric',
            ],
            [
                'sizes.required' => 'Kindly check at least one of the above checkboxes.',
                'product_name.regex' => 'Symbols not allowed',
            ]
        );

        $product->product_name = $request->input('product_name');
        $product->unit = $request->input('unit');
        $product->exchangeable = $request->input('exchangeable');
        $product->refundable = $request->input('refundable');
        $product->sizes = implode(',', $request->input('sizes'));
        $product->short_desc = $request->input('short_desc');
        $product->more_details = $request->input('more_details');
        $product->bulletin_1 = $request->input('bulletin_1');
        $product->bulletin_2 = $request->input('bulletin_2');
        $product->bulletin_3 = $request->input('bulletin_3');
        $product->bulletin_4 = $request->input('bulletin_4');
        $product->bulletin_5 = $request->input('bulletin_5');
        $product->price = $request->input('price');
        $product->disc_rate = $request->input('disc_rate');
        $product->disc_price = $request->input('disc_price');
        $product->final_price = $request->input('final_price');
        $product->status = 1;

        // Setting the number of images that are need to handle
        $numberOfImages = 5;

        for ($i = 1; $i <= $numberOfImages; $i++) {
            $fieldName = 'image_' . $i;
            if ($request->file($fieldName)) {
                File::delete(public_path($product->{$fieldName}));
                $file = $request->file($fieldName);
                $uniqueName = uniqid() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('adminassets/uploads/images/products');
                $viewImage = 'adminassets/uploads/images/products/';
                $filename = $viewImage . $uniqueName;
                $file->move($destinationPath, $filename);
                $product->$fieldName = $filename;
            }
        }

        $product->save();

        return redirect()->route('admin.products.view')
            ->with('successproductupdation', 'Task Done.');
    }

    public function destroy_product($id)
    {
        // Find the item to delete
        $product = Products::findOrFail($id);
        File::delete(public_path($product->image_1));
        File::delete(public_path($product->image_2));
        File::delete(public_path($product->image_3));
        File::delete(public_path($product->image_4));
        File::delete(public_path($product->image_5));
        // Delete the item
        $product->delete();

        return redirect()->back()->with('successproductdelete', 'Item deleted successfully');
    }
}
