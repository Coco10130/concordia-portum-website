<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Seller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $quantity = $request->input('quantity', 1);

        $existingCartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($existingCartItem) {
            $existingCartItem->quantity += $quantity;
            $existingCartItem->save();
        } else {
            $cartItem = new Cart();
            $cartItem->user_id = $user->id;
            $cartItem->product_id = $productId;
            $cartItem->quantity = $quantity;
            $cartItem->save();
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function checkOut(Request $request)
    {
        $checkedProductIds = $request->input('product_ids');

        return redirect()->route('cart.checkout.view', ['product_ids' => $checkedProductIds]);
    }

    public function checkOutView(Request $request)
    {
        $user = Auth::user();
        $cartItemsCount = Cart::where('user_id', $user->id)->count();
        $selectedProductIds = $request->input('product_ids');

        $selectedProducts = Product::whereIn('id', $selectedProductIds)->with('seller')->get();

        $merchandiseSubtotal = 0;
        foreach ($selectedProducts as $product) {
            $cart = Cart::where('user_id', $user->id)
                ->where('product_id', $product->id)
                ->first();
            $subtotal = $product->price * $cart->quantity;
            $merchandiseSubtotal += $subtotal;
        }

        $shippingFee = 0;
        $shopsWithPiano = [];
        foreach ($selectedProducts as $product) {
            $category = strtolower($product->category);
            if ($category === 'piano') {
                $shopsWithPiano[$product->seller->shop_name] = true;
                $shippingFee += 200;
            } elseif (in_array($category, ['violin', 'trumpet', 'saxophone', 'clarinet'])) {
                $shippingFee += 100;
            }
        }

        foreach ($shopsWithPiano as $shop => $hasPiano) {
            if ($hasPiano && count($selectedProducts->where('seller.shop_name', $shop)) > 1) {
                $shippingFee -= 200;
                $shippingFee += 250;
            }
        }

        $discount = $merchandiseSubtotal * 0.1;

        $totalPayment = $merchandiseSubtotal + $shippingFee - $discount;

        $groupedProducts = $selectedProducts->groupBy('seller.shop_name');

        return view('check-out', compact('user', 'groupedProducts', 'merchandiseSubtotal', 'shippingFee', 'totalPayment', 'cartItemsCount', 'subtotal'));
    }

    public function placeOrder(Request $request)
    {
        $user = Auth::user();
        $selectedProductIds = $request->input('product_ids');

        if (!is_null($selectedProductIds)) {
            foreach ($selectedProductIds as $productId) {
                $cartItem = Cart::where('product_id', $productId)
                    ->where('user_id', $user->id)
                    ->first();

                if ($cartItem) {
                    $product = Product::find($productId);
                    $product->quantity -= $cartItem->quantity;

                    if ($product->quantity <= 0) {
                        $product->delete();
                    } else {
                        $product->save();
                    }

                    $order = new Order();
                    $order->shop_name = $product->seller->shop_name;
                    $order->product_name = $product->product_name;
                    $order->price = $product->price;
                    $order->quantity = $cartItem->quantity;
                    $order->image = $product->image;
                    $order->user_id = $user->id;
                    $order->save();

                    $cartItem->delete();
                }
            }
        }

        return redirect()->route('cart.index')->with('success', 'Order placed successfully!');
    }
}
