@extends('layouts.forgot-pass-layout')

@section('style')
    <link rel="stylesheet" href="/css/createnewpassw.css">
@endsection

@section('content')
    <div class="card w-50 mx-auto p-4">
        <h1 class="text-center mb-5" style="font-family: 'Kavoon', cursive;">Create your New Password</h1>
        <p>Your new password must be different from previously used password.</p>

        @include('auth.create-new-password')
    </div>
@endsection
