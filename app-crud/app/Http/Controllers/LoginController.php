<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

        if (auth()->attempt($validated))
        {
            return redirect()
                ->route('products.index')
                ->with('success', 'Logged in successfully!');
        } else {
            $message = 'Invalid credentials. Please try again.';
            return view('login', compact('message'));
        }
    }
}
