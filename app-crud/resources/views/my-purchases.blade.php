@extends('layouts.navigation')

@section('style')
    <link rel="stylesheet" href="/css/purchase.css">
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-2 mt-5 d-flex align-items-center" style="height: 70vh">
            <div class="navigation">
                <ul>
                    <a href="/profile" class="h5 {{ Request::is('profile') ? 'active' : '' }} profile">My Profile</a>
                </ul>
                <ul>
                    <a href="/my-purchases" class="h5 {{ Request::is('my-purchases') ? 'active' : '' }} my-purchase">My Purchase</a>
                </ul>
                <ul>
                    <a href="/my-shop" class="h5 {{ Request::is('my-shop') ? 'active' : '' }} my-shop">My Shop</a>
                </ul>
            </div>
        </div>

        <div class="col-9 mt-5">
            @include('shared.my-purchase-card')
        </div>
    </div>
@endsection
