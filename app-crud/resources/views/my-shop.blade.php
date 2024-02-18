@extends('layouts.navigation')

@section('style')
    <link rel="stylesheet" href="/css/profile.css">
@endsection

@section('content')
    <div class="row mt-5" {{-- style="height: 86vh;" --}}>
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

        <div class="col-9 mt-5">
            <div class="container-fluid placeholders pb-5">
                <div class="row">
                    <div class="col">
                        <p class="my-profile h2 mt-4">My Shop</p>
                    </div>
                </div>
                @if ($user->is_seller)
                    <div class="row mt-5">
                        <div class="col-3 d-flex justify-content-center align-items-center">
                            <div class="container-fluid">
                                {{-- blank --}}
                            </div>
                        </div>


                        {{-- profile labels --}}
                        <div class="col-2">
                            <div class="container-fluid">
                                <div class="row mt-5">
                                    <div class="col d-flex justify-content-end align-items-center">
                                        <p class="user-name">Shop Name:</p>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col d-flex justify-content-end align-items-center">
                                        <p class="user-name">Shop Email:</p>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col d-flex justify-content-end align-items-center">
                                        <p class="user-name">Shop Email:</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- profile details --}}
                        <div class="col-5 mb-3 d-flex justify-content-start align-items-center">
                            {{-- profile content goes here --}}
                            @include('shared.shop-profile')
                        </div>
                    </div>

                    <div class="row-mt5">
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            @include('shared.create')
                        </div>
                    </div>
                @else
                    <p class="btn-holder mt-5 d-flex justify-content-center align-items-center"> <a href="/register-seller"
                            class="btn btn-outline-secondary">
                            Register as Seller
                        </a>
                    </p>
                @endif



            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success text-center mt-4">
                {{ session('success') }}
            </div>
        @endif
    </div>

    @if ($user->is_seller)
        <div class="container-fluid  d-flex justify-content-center align-items-center">
            <div class="row  d-flex justify-content-center align-items-center">
                <div class="col">
                    @if ($products->isEmpty())
                        <p class="mt-4 col d-flex justify-content-center align-items-center h4" style="margin-bottom: 100px;">No products available</p>
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
