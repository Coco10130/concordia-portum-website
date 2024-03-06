<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Please log in to add products to cart.'], 401);
        }

        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }

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

        return response()->json(['success' => 'Product added to cart successfully.']);
    }

    public function checkOut(Request $request)
    {
        $checkedProductIds = $request->input('product_ids');

        return response()->json(['product_ids' => $checkedProductIds], 200);
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

        $shippingFee = 60;

        $totalPayment = $merchandiseSubtotal + $shippingFee;

        $groupedProducts = $selectedProducts->groupBy('seller.shop_name');

        return response()->json([
            'user' => $user,
            'groupedProducts' => $groupedProducts,
            'merchandiseSubtotal' => $merchandiseSubtotal,
            'shippingFee' => $shippingFee,
            'totalPayment' => $totalPayment,
            'cartItemsCount' => $cartItemsCount,
            'subtotal' => $subtotal
        ]);
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

        return response()->json(['success' => 'Order placed successfully!'], 200);
    }
}
