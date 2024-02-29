@extends('layouts.forgot-pass-layout')

@section('style')
<link rel="stylesheet" href="/css/forgotpass.css">
@endsection

@section('content')
<div class="card w-50 mx-auto p-4">
    <h1 class="text-center mb-5" style="font-family: 'Kavoon', cursive; color: #ffffff;">Forgot your Password</h1>
    <p style="color: #ffffff;">Please enter your email address to recieve a verification code.</p>
    @include('auth.enter-email')
    
</div>
@endsection