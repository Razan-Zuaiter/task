<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $cat = Category::all();
        return view('pages.product', compact('products', 'cat'));
    }
    public function store(Request $request)
    {
        request()->validate([
            'product_name' => 'required|min:3',
            'product_price' => 'required',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!empty(request()->product_image)) {
            $imageName = time() . '.' . request()->product_image->getClientOriginalExtension();
            request()->product_image->move(public_path('images'), $imageName);
        } else {
            $imageName = 'default.png';
        }


        $var = new Product();
        $var->product_name = $request->input('product_name');
        $var->product_price = $request->input('product_price');
        $var->cat_id = $request->input('cat_id');
        $var->product_image = $imageName;

        $var->save();
        return back()->with('success', 'Product created successfully.');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('pages.editProduct', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|min:4',
            'product_price' => 'required|min:5|max:200',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if (!empty(request()->product_image)) {
            $imageName = time() . '.' . request()->product_image->getClientOriginalExtension();
            request()->product_image->move(public_path('images'), $imageName);
        } else {
            $product = Product::find($id);
            $imageName = $product->product_image;
        }

        $product = Product::find($id);
        $product->product_name =  $request->get('product_name');
        $product->product_price = $request->get('product_price');
        $product->cat_id = $request->input('cat_id');
        $product->product_image = $imageName;
        $product->save();

        return redirect('/product')->with('success', 'product updated!');
    }



    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return back()->with('success', 'Category deleted!');
    }
}
