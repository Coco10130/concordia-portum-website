<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $cartItemsCount = $user ? Cart::where('user_id', $user->id)->count() : 0;
        $products = Product::all();

        return response()->json([
            'user' => $user,
            'cartItemsCount' => $cartItemsCount,
            'products' => $products,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image',
            'product_name' => 'required|string|unique:products,product_name',
            'price' => 'required|numeric',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = 'images/';
            $file->move($path, $filename);
        }

        $product = new Product();
        $product->image = $path . $filename;
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->user_id = auth()->user()->id;
        $product->save();

        return response()->json(['message' => 'Product added successfully']);
    }

    public function addToCart(Request $request, $productId)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Please log in to add products to cart.'], 401);
        }

        $product = Product::findOrFail($productId);

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

        return response()->json(['message' => 'Product added to cart successfully'], 200);
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);

        if ($product->user_id !== auth()->user()->id) {
            return response()->json(['error' => 'Unauthorized access'], 403);
        }

        $product->carts()->delete();

        Storage::delete($product->image);

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'], 200);
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->user_id !== auth()->user()->id) {
            return response()->json(['error' => 'Unauthorized access'], 403);
        }

        $request->validate([
            'image' => 'image',
            'product_name' => 'required|string|unique:products,product_name,' . $product->id,
            'price' => 'required|numeric',
        ]);

        if ($request->has('image')) {
            Storage::delete($product->image);

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'images/';
            $file->move($path, $filename);
            $product->image = $path . $filename;
        }

        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->save();

        return response()->json(['message' => 'Product updated successfully'], 200);
    }
}
