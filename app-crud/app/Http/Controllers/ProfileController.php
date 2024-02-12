<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Seller;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cartItemsCount = Cart::where('user_id', $user->id)->count();
        return view('profile', compact('user', 'cartItemsCount'));
    }

    public function myShop()
    {
        $user = Auth::user();
        $seller = $user->seller;
        $cartItemsCount = Cart::where('user_id', $user->id)->count();

        $products = Product::where('user_id', $user->id)->get();

        return view('my-shop', compact('user', 'seller', 'products', 'cartItemsCount'));
    }

    public function registerView()
    {

        return view('my-shop-register');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'gender' => 'required|in:male,female',
            'phoneNumber' => 'nullable|size:11',
            'birthDate' => 'required',
        ]);

        $user = auth()->user();

        $user->gender = $request->input('gender');
        if ($request->has('phoneNumber')) {
            $user->phoneNumber = $request->input('phoneNumber');
        }
        if ($request->has('birthDate')) {
            $user->birthDate = $request->input('birthDate');
        }
        $user->save();

        return redirect()->back();
    }

    public function registerSeller(Request $request)
    {
        $validated = $request->validate([
            'shop_name' => 'required',
            'shop_email' => 'required|email|unique:sellers,shop_email',
            'shop_phone_number' => 'required|size:11',
        ]);

        // Retrieve the authenticated user
        $user = auth()->user();
        $user->is_seller = true;
        $user->save();

        // Create or update the associated seller record
        $user->seller()->updateOrCreate(
            [],
            [
                'shop_name' => $validated['shop_name'],
                'shop_email' => $validated['shop_email'],
                'shop_phone_number' => $validated['shop_phone_number'],
            ],
        );
        return redirect()->route('myShop')->with('success', 'You have become a seller!');
    }
}
