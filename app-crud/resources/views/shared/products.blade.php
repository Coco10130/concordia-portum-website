<div class="row product-row mt-5">
    <div class="col d-flex justify-content-center">
        <div class="row mb-5">
            @if ($products->isEmpty())
                <div class="col d-flex justify-content-center align-items-center">No products available</div>
            @else
                @foreach ($products as $index => $product)
                    @if ($index % 3 == 0)
                        <div class="col"></div> <!-- Empty column for alignment -->
                        <div class="w-100"></div> <!-- Clearing previous column -->
                    @endif
                    <div class="col-4 mt-5">
                        <div class="card product-card" style="width: 283px">
                            <img src="{{ asset($product->image) }}" class="card-img-top"
                                alt="Product Image">
                            <div class="card-body">
                                <h5 class="card-title product-name">{{ $product->product_name }}</h5>
                                <h6 class="price">₱{{ number_format($product->price, 2) }}</h6>
                                {{-- <p class="btn-holder mt-4">
                                    <a href="#" class="btn btn-outline-secondary">Add to cart</a>
                                </p> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
