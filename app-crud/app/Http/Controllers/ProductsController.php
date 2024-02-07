<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function index()
    {
        return view('dashboard',[
            'products' => Products::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'product_name' => 'required|string',
            'price' => 'required|numeric',
        ]);

        // Upload image
        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'images/';
            $file->move($path, $filename);
        }

        // Create new product
        $product = new Products();
        $product->image = $path.$filename;
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->save();

        return redirect()
            ->route('products.index');
    }
}
