<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            return response()->json(['user' => $user]);
        } else {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'userName' => 'required|min:4|unique:users,userName',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        if (!filter_var($validatedData['email'], FILTER_VALIDATE_EMAIL) || !preg_match('/@gmail\.com$/', $validatedData['email'])) {
            return response()->json(['error' => 'Only valid Gmail accounts are allowed to register.'], 422);
        }

        $user = User::create([
            'userName' => $validatedData['userName'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return response()->json(['user' => $user], 201);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function registerSeller(Request $request)
    {
        $validated = $request->validate([
            'shop_name' => 'required',
            'shop_email' => 'required|email|unique:sellers,shop_email',
            'shop_phone_number' => 'required|digits:11',
        ]);

        if (!filter_var($validated['shop_email'], FILTER_VALIDATE_EMAIL) || !preg_match('/\.up@phinmaed\.com$/', $validated['shop_email'])) {
            return response()->json(['error' => 'Only valid Phinmaed accounts are allowed to register.'], 422);
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

        return response()->json(['message' => 'You have become a seller!'], 200);
    }
}
