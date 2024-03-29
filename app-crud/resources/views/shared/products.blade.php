<div class="row product-row mt-5" style="padding-left: 180px;">
    <div class="col d-flex justify-content-center">
        <div class="row d-flex justify-content-between align-items-center mb-5">
            @if ($products->isEmpty())
                <div class="col d-flex justify-content-center align-items-center">No products available</div>
            @else
                @foreach ($products as $index => $product)
                    @if ($index % 3 == 0)
                        <div class="col"></div>
                        <div class="w-100"></div>
                    @endif
                    <div class="col-4 mt-5">
                        <div class="card product-card" style="width: 283px">
                            <img src="{{ asset($product->image) }}" class="card-img-top" alt="Product Image">
                            <div class="card-body">
                                <p class="price">Stock: {{ $product->quantity }}</p>
                                <h5 class="card-title product-name">{{ $product->product_name }}</h5>
                                <h6 class="price">₱{{ number_format($product->price, 2) }}</h6>
                                <div class="btn-group mt-3" role="group" aria-label="Product Actions">
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-primary">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<style>
    .product-card:hover {
        transform: scale(1.1);
    }

    .product-card {
        transition: 0.3s ease-in-out;
    }

    .product-card img {
        width: 280px;
        height: 280px;
    }

    .price,
    .product-name,
    .text {
        font-family: 'popppins';
    }

    .product-name {
        font-size: 20px;
    }

    .quantity-input {
        width: 70px;
        height: 30px;
    }

    .form-quantity label {
        font-size: 12px;
    }
</style>
