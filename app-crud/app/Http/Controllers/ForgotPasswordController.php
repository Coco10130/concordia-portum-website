<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('forgot-password');
    }


    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
        ]);

        Mail::send('emails.forgot-password', ['token' => $token], function($message) use ($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->to(route("forgot.password.view"))->with('success', 'We have send a email to reset your password');
    }

    public function resetPassword($token)
    {
        return view('create-new-password', compact('token'));
    }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|confirmed|string|min:8',
            'password_confirmation' => 'required',
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token,
            ])
            ->first();

            

        if (!$updatePassword) {
            return redirect()->to(route('reset.password'))->with('error', 'Invalid');
        }

        User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')
            ->where('email', $request->email)
            ->delete();

        return redirect()->to(route('login.index'))->with('success', 'Password reset successfully!');
    }

}
