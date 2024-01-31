<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store()
    {
        $validated = request()->validate([
            'firstName' => 'required|min:4',
            'lastName' => 'required|min:4',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        User::create([
            'firstName' => $validated['firstName'],
            'lastName' => $validated['lastName'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()
            ->route('login.index')
            ->with('success', 'Account created successfully!');
    }
}
