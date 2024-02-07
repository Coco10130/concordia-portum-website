@extends('layouts.navigation')

@section('content')
    <div class="row mt-5">
        <div class="col d-flex justify-content-center align-items-center">
            <div class="product-container" style="padding-top: 50px;">
                <div class="row mb-5">
                    <div class="col mb-4">
                        <!-- Carousel code goes here -->
                    </div>
                </div>

                @include('shared.create')

                <div class="row product-row mt-5" style="margin-left: 100px">
                    <div class="col">
                        <div class="row">
                                @if ($products->isEmpty())
                                    <div class="col d-flex justify-content-center align-items-center">No products available</div>
                                @else
                                    @foreach ($products as $index => $product)
                                        @if ($index % 3 == 0)
                                            <div class="col"></div> <!-- Empty column for alignment -->
                                            <div class="w-100"></div> <!-- Clearing previous column -->
                                        @endif
                                        <div class="col-4 mt-5">
                                            <div class="card product-card" style="width: 18rem;">
                                                <img src="{{ asset('images') }}/{{ $product->image }}" class="card-img-top" alt="Product Image">
                                                <div class="card-body">
                                                    <h5 class="card-title product-name">{{ $product->product_name }}</h5>
                                                    <h6 class="price">₱{{ number_format($product->price, 2) }}</h6>
                                                    <button type="button" class="btn btn-outline-secondary">Buy Now</button>
                                                    <button type="button" class="btn btn-outline-secondary" style="margin-left: 30px;">Add to cart</button>
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
