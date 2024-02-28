<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function auth()
    {
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (auth()->attempt($validated)) {
            return redirect()->route('products.index');
        } else {
            $message = 'Invalid credentials. Please try again.';
            return view('login', compact('message'));
        }
    }

    public function register()
    {
        $validated = request()->validate([
            'userName' => 'required|min:4|unique:users,userName',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        if (!filter_var($validated['email'], FILTER_VALIDATE_EMAIL) || !preg_match('/@gmail\.com$/', $validated['email'])) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['email' => 'Only valid Gmail accounts are allowed to register.']);
        }

        if (User::where('email', $validated['email'])->exists()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['email' => 'Email already exists.']);
        }

        User::create([
            'userName' => $validated['userName'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('login.index')->with('success', 'Account has been created');
    }

    public function registerView()
    {
        return view('register');
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login.index');
    }
}
