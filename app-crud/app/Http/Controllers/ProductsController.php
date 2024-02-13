<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\JsonResponse;

class ProductsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $cartItemsCount = Cart::where('user_id', $user->id)->count();
        $products = Product::all();

        return view('dashboard', compact('cartItemsCount', 'products', 'user'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'product_name' => 'required|string|unique:products,product_name',
            'price' => 'required|numeric',
        ]);

        // Upload image
        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $path = 'images/';
            $file->move($path, $filename);
        }

        // Create new product
        $product = new Product();
        $product->image = $path . $filename;
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->user_id = auth()->user()->id;
        $product->save();

        return redirect()->route('myShop')->with('success', 'Product added successfully!');
    }

    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $user = auth()->user();

        $cart = $request->session()->get('cart', []);

        if (isset($cart[$user->id][$productId])) {
            $cart[$user->id][$productId]['quantity']++;
        } else {
            $cart[$user->id][$productId] = [
                'name' => $product->product_name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1,
            ];
        }

        $request->session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
}
