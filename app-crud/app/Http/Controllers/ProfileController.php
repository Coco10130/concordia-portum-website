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
            'gender' => 'nullable|in:male,female',
            'phoneNumber' => 'nullable|size:11',
            'birthDate' => 'nullable',
            'image' => 'nullable|image',
        ]);

        $user = auth()->user();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $path = 'images/';

            if (!$file->move(public_path($path), $fileName)) {
                return redirect()->back()->with('error', 'Failed to move the uploaded image file.');
            }

            if ($user->image && file_exists(public_path($user->image))) {
                if (!unlink(public_path($user->image))) {
                    return redirect()->back()->with('error', 'Failed to delete the old image file.');
                }
            }

            $user->image = $path . $fileName;
        }

        if ($request->filled('gender')) {
            $user->gender = $request->input('gender');
        }

        if ($request->filled('phoneNumber')) {
            $user->phoneNumber = $request->input('phoneNumber');
        }

        if ($request->filled('birthDate')) {
            $user->birthDate = $request->input('birthDate');
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function registerSeller(Request $request)
    {
        $validated = $request->validate([
            'shop_name' => 'required',
            'shop_email' => 'required|email|unique:sellers,shop_email',
            'shop_phone_number' => 'required|size:11',
        ]);

        if (!filter_var($validated['email'], FILTER_VALIDATE_EMAIL) || !preg_match('\.up/@phinmaed\.com$/', $validated['email'])) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['email' => 'Only valid Phinmaed accounts are allowed to register.']);
        }

        $user = auth()->user();
        $user->is_seller = true;
        $user->save();

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
