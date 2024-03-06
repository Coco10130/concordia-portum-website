@extends('layouts.forgot-pass-layout')

@section('style')
    <link rel="stylesheet" href="/css/forgotpass.css">
@endsection

@section('content')
    <h1 class="text-center mb-5" style="font-family: 'oswald'; color: #ffffff;">Forgot your Password</h1>
    <p class="" style="color: #ffffff; font-family: 'oswald';" >Please enter your email address to recieve a verification code.</p>
    @include('auth.enter-email')
@endsection
