@extends('layouts.navigation')

@section('content')
    <div class="row align-items-center justify-content-center">
        <div class="col-10">
            @include('layouts.carousel')
        </div>
    </div>
    <div class="row">
        <div class="col-2 navigation d-flex justify-content-center align-items-center"
            style="height: 50vh; margin-top: 10vh;">
            <!-- navigation.blade.php -->

            @include('shared.category-nav')


        </div>
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
                            {{-- Display products based on active category --}}
                            @if (isset($category))
                                @include('categories.' . $category)
                            @else
                                @if ($products->isEmpty())
                                    <div class="col d-flex justify-content-center align-items-center">No products available
                                    </div>
                                @else
                                    @foreach ($products as $index => $product)
                                        @if ($index % 3 == 0)
                                            <div class="col"></div>
                                            <div class="w-100"></div>
                                        @endif

                                        <div class="col-4 mt-5 prod-col">
                                            <div class="card product-card">
                                                <img src="{{ asset($product->image) }}" class="card-img-top"
                                                    alt="Product Image">
                                                <div class="card-body" style="border-top: 1px solid rgb(0, 0, 0)">
                                                    <div class="d-flex justify-content-between">
                                                        <p class="price">{{ $product->seller->shop_name }}</p>
                                                        <p class="price">Stock: {{ $product->quantity }}</p>
                                                    </div>
                                                    <h5 class="card-title product-name">{{ $product->product_name }}</h5>
                                                    <h6 class="price">₱{{ number_format($product->price, 2) }}</h6>
                                                    <form action="{{ route('productsAddToCart', $product->id) }}"
                                                        method="POST"
                                                        class="d-flex align-items-center justify-content-between align-items-center">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn text btn-outline-secondary mt-3">Add to cart</button>
                                                        <div class="form-group form-quantity">
                                                            <label for="quantity">Quantity:</label>
                                                            <input type="number" name="quantity" id="quantity"
                                                                value="1" min="1" max="{{ $product->quantity }}"
                                                                class="form-control quantity-input" required>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
