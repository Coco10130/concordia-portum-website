<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Seller;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'gender' => 'nullable|in:male,female',
            'phoneNumber' => ['nullable', 'size:11', 'regex:/^09/'],
            'birthDate' => 'nullable',
            'address' => 'nullable',
            'image' => 'nullable|image',
        ]);

        $user = auth()->user();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $path = '/images/';

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

        if ($request->filled('address')) {
            $user->address = $request->input('address');
        }

        if ($request->filled('birthDate')) {
            $user->birthDate = $request->input('birthDate');
        }

        $user->save();

        return response()->json(['message' => 'Profile updated successfully']);
    }

    public function showProfile()
    {
        try {
            $user = Auth::user();

            return response()->json([
                'user' => $user,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'User not found.'], 404);
        }
    }

    public function registerSeller(Request $request)
    {
        $validated = $request->validate([
            'shop_name' => 'required',
            'shop_email' => 'required|email|unique:sellers,shop_email',
            'shop_phone_number' => ['required', 'size:11', 'regex:/^09/'],
        ]);

        if (!filter_var($validated['shop_email'], FILTER_VALIDATE_EMAIL) || !preg_match('/\.up@phinmaed\.com$/', $validated['shop_email'])) {
            return response()->json(['error' => 'Only valid Phinmaed accounts are allowed to register.'], 422);
        }

        $user = auth()->user();
        $user->is_seller = true;
        $user->save();

        $seller = $user->seller()->updateOrCreate(
            [],
            [
                'shop_name' => $validated['shop_name'],
                'shop_email' => $validated['shop_email'],
                'shop_phone_number' => $validated['shop_phone_number'],
            ],
        );

        return response()->json(['message' => 'You have become a seller!', 'seller' => $seller], 201);
    }

    public function purchaseView(Request $request)
    {
        $user = Auth::user();
        $cartItemsCount = Cart::where('user_id', $user->id)->count();

        $orders = Order::where('user_id', $user->id)
            ->with([
                'product' => function ($query) {
                    $query->with('seller');
                },
            ])
            ->get();

        return response()->json([
            'cartItemsCount' => $cartItemsCount,
            'user' => $user,
            'orders' => $orders,
        ]);
    }
}