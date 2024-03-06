@extends('layouts.forgot-pass-layout')

@section('style')
    <link rel="stylesheet" href="/css/createnewpass.css">
@endsection

@section('content')
    <div class="cardd w-40 mx-auto p-4">
        <h1 class="text-center mb-5" style="font-family: 'oswald'; color: #ffffff;">Create your New Password</h1>
        <p style="color: #ffffff; font-family: 'oswald';">Your new password must be different from previously used password.</p>

        @include('auth.create-new-password')
    </div>
@endsection
