@extends('layouts.navigation')

@section('style')
    <link rel="stylesheet" href="/css/profile.css">
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-2 mt-5 d-flex align-items-center" style="height: 70vh">
            <div class="navigation">
                <ul>
                    <a href="/profile" class="{{ Request::is('profile') ? 'active' : '' }} profile">My Profile</a>
                </ul>
                <ul>
                    <a href="/my-purchases" class="{{ Request::is('my-purchases') ? 'active' : '' }} my-purchase">My Purchase</a>
                </ul>
                <ul>
                    <a href="/my-shop" class="{{ Request::is('my-shop') ? 'active' : '' }} my-shop">My Shop</a>
                </ul>
            </div>
        </div>

        <div class="col-9 mt-5">
            @include('shared.my-shop-card')
        </div>

        @if (session('success'))
            <div class="alert alert-success text-center mt-4">
                {{ session('success') }}
            </div>
        @endif
    </div>

    @if ($user->is_seller)
        <div class="container-fluid d-flex justify-content-center align-items-center">
            <div class="row  d-flex justify-content-center align-items-center">
                <div class="col">
                    @if ($products->isEmpty())
                        <p class="mt-4 text col d-flex justify-content-center align-items-center h4" style="margin-bottom: 50px;">No products available</p>
                    @else
                        @include('shared.products')
                        @error('productName')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    @endif
                </div>
            </div>
        </div>
    @endif
@endsection
