<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
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
}
