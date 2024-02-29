<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Seller;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function updateProfile(Request $request)
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

        if ($request->filled('birthDate')) {
            $user->birthDate = $request->input('birthDate');
        }

        $user->save();

        return response()->json(['message' => 'Profile updated successfully']);
    }
}
