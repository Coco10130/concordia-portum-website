@extends('layouts.navigation')

@section('style')
    <link rel="stylesheet" href="/css/profile.css">
@endsection

@section('content')
    <div class="row mt-5" style="height: 86vh;">
        <div class="col-2 mt-5 d-flex align-items-center">
            <div class="navigation">
                <ul>
                    <a href="/profile" class="{{ Request::is('profile') ? 'active' : '' }}">My Profile</a>
                </ul>
                <ul>
                    <a href="/my-shop" class="{{ Request::is('my-shop') ? 'active' : '' }}">My Shop</a>
                </ul>
            </div>
        </div>

        {{-- edit profile --}}

        <div class="col-9 mt-5">
            @include('shared.edit-profile')
        </div>
    </div>
@endsection
