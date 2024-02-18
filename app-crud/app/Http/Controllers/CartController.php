<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;

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
        $product = Product::findOrFail($productId);
        $user = auth()->user();

        $cartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->quantity++;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

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
