<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $cartItemsCount = 0;

        if ($user) {
            $cartItems = Cart::where('user_id', $user->id)->get();
            $cartItemsCount = $cartItems->count();
        }

        $category = $request->query('category');
        $products = Product::query();

        if ($category) {
            $category = ucfirst(strtolower($category));
            $products->where('category', $category);
        }

        $products = $products->get();
        $productsWithShopName = [];
        foreach ($products as $product) {
            $shop_name = $product->seller->shop_name;
            $productData = $product->toArray();
            $productData['shop_name'] = $shop_name;
            $productsWithShopName[] = $productData;
        }

        return response()->json([
            'category' => $category,
            'products' => $products,
            'cartItemsCount' => $cartItemsCount,
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {
        if (!auth()->check()) {
            return response()->json(['error' => 'Unauthorized. Please log in.'], 401);
        }

        $request->validate([
            'image' => 'required|image',
            'product_name' => 'required|string|unique:products,product_name',
            'price' => 'required|numeric',
        ]);
        
        $user = auth()->user();

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
        $product->user_id = $user->id;
        $product->save();

        return response()->json(['message' => 'Product added successfully']);
    }

    public function addToCart(Request $request, $productId)
    {
        if (!$user) {
            return response()->json(['error' => 'Not Authorized'], 401);
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
                'quantity' => $product->quantity,
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
    
        // Check if there are any associated carts and delete them if present
        if ($product->carts()->exists()) {
            $product->carts()->delete();
        }
    
        // Delete the product's image from storage
        Storage::delete($product->image);
    
        // Delete the product
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
            'quantity' => 'required|numeric|min:1'
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
        $product->quantity = $request->quantity;
        $product->save();

        return response()->json(['message' => 'Product updated successfully'], 200);
    }
}
