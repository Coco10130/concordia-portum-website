<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $cartItems = Cart::where('user_id', $user->id)->get();
        $cartItemsCount = $cartItems->count();

        return view('cart', compact('cartItems', 'cartItemsCount', 'user'));
    }

    public function addToCart(Request $request, $productId)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login.index')->with('error', 'Please log in to add products to cart.');
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

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function checkOut(Request $request)
    {
        $checkedProductIds = $request->input('product_ids');

        Cart::whereIn('product_id', $checkedProductIds)->delete();

        return redirect()->route('cart.index')->with('success', 'Products already checked out!');
    }

    public function removeItems(Request $request)
    {
        $checkedProductIds = $request->input('product_ids');

        Cart::whereIn('product_id', $checkedProductIds)->delete();

        // Trigger JavaScript function to update total values
        return redirect()->route('cart.index')->with('success', 'Products removed from cart successfully!');
    }
}
