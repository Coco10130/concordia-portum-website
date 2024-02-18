@extends('layouts.navigation')

@section('content')
    <div class="row align-items-center justify-content-center">
        <div class="col-10">
            @include('layouts.carousel')
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center align-items-center">
            <div class="product-container" style="padding-top: 50px;">

                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row product-row" style="margin-left: 60px">
                    <div class="col">
                        <div class="row d-flex justify-content-between align-items-center mb-5">
                            @if ($products->isEmpty())
                                <div class="col d-flex justify-content-center align-items-center">No products available
                                </div>
                            @else
                                @foreach ($products as $index => $product)
                                    @if ($index % 3 == 0)
                                        <div class="col"></div>
                                        <div class="w-100"></div>
                                    @endif

                                    <div class="col-4 prod-col mt-5">
                                        <div class="card product-card" style="width: 283px">
                                            <img src="{{ asset($product->image) }}" class="card-img-top"
                                                alt="Product Image">
                                            <div class="card-body">
                                                <h5 class="card-title product-name">{{ $product->product_name }}</h5>
                                                <h6 class="price">₱{{ number_format($product->price, 2) }}</h6>
                                                <form action="{{ route('products.addToCart', $product->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-secondary">Add to
                                                        cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<style>

</style>
