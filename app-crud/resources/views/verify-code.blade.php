@extends('layouts.forgot-pass-layout')

@section('style')
    <link rel="stylesheet" href="/css/verifyemail.css">
@endsection

@section('content')
    <div class="card w-50 mx-auto p-4">
        <h1 class="text-center mb-5" style="font-family: 'Kavoon', cursive; color: #ffffff;">Verify your Email</h1>
        <p style="color: #ffffff;">Please enter the 6 digit code sent to your email address.</p>
        

        @include('auth.verify-code')
    </div>
@endsection
