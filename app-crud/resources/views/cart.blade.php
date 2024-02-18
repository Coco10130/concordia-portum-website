@extends('layouts.navigation')

@section('style')
    <link rel="stylesheet" href="/css/cart.css">
@endsection

@section('content')
    <div class="row upper-row pd-5">
        <div class="col-1 product-col mt-3 d-flex align-items-center justify-content-center" style="padding: 30px 0px;">
            <!-- Removed the check-all checkbox -->
        </div>

        <div class="col-4 product-col mt-3 d-flex align-items-center justify-content-center">
            <p class="product-item-text h4">Product Item</p>
        </div>

        <div class="col-2 product-col mt-3 d-flex align-items-center justify-content-center">
            <p class="price h4">Price</p>
        </div>

        <div class="col-2 product-col mt-3 d-flex align-items-center justify-content-center">
            <p class="quantity h4">Quantity</p>
        </div>

        <div class="col product-col mt-3 d-flex align-items-center justify-content-center">
            <p class="total-price h4">Total Price</p>
        </div>

        <div class="col-1 product-col mt-3 d-flex align-items-center justify-content-center">

        </div>
    </div>

    <form method="POST" action="{{ route('cart.checkout') }}">
        @csrf

        @if ($cartItems !== null && count($cartItems) > 0)
            @foreach ($cartItems as $index => $item)
                <div class="row d-flex justify-content-center">
                    <div class="col-1 product-col mt-2 d-flex align-items-center justify-content-center">
                        <div class="select mt-2">
                            <input class="form-check-input" type="checkbox" id="checkbox-{{ $index }}"
                                name="product_ids[]" value="{{ $item->product_id }}" aria-label="...">
                        </div>
                    </div>

                    <div class="col-4 product-col mt-2" style="padding: 8px 30px;">
                        <div class="product-item d-flex align-items-center">
                            <img src="{{ asset($item->product->image) }}" alt="Product Image">
                            <p class="product-name h5">{{ $item->product->product_name }}</p>
                        </div>
                    </div>

                    <div class="col-2 product-col mt-2 d-flex align-items-center justify-content-center">
                        <p class="product-price h5">₱ {{ number_format($item->product->price, 2) }}</p>
                    </div>

                    <div class="col-2 product-col mt-2 d-flex align-items-center justify-content-center">
                        <p class="quantity-text h4">{{ $item->quantity }}</p>
                    </div>

                    <div class="col-2 product-col mt-2 d-flex align-items-center justify-content-center">
                        <p class="total-price">₱ {{ number_format($item->product->price * $item->quantity, 2) }}</p>
                    </div>

                    <div class="col-1 product-col mt-2 d-flex align-items-center justify-content-center">
                        <!-- Each delete button is in its own form -->
                        {{-- <form action="{{ route('cart.remove-items') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="product_ids[]" value="{{ $item->product_id }}">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form> --}}
                    </div>
                </div>
            @endforeach
        @else
            <p class="h4 text-center mt-4" style="font-family: 'Constantia', sans-serif;">Your cart is empty.</p>
        @endif

        <div class="row mt-3 mb-5">
            <div class="col-9">
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="col-3">
                <div class="card cart-totals">
                    <div class="card-body">
                        <div class="row d-flex align-items-center justify-content-between">
                            <div class="col-6 text-left">Subtotal:</div>
                            <div class="col-6 text-right"><span id="subtotal-value">0.00</span></div>
                        </div>
                        <div class="row d-flex align-items-center justify-content-between">
                            <div class="col-6 text-left">Tax:</div>
                            <div class="col-6 text-right"><span id="tax-value">0.00</span></div>
                        </div>
                        <div class="row d-flex align-items-center justify-content-between">
                            <div class="col-6 text-left">Total Items:</div>
                            <div class="col-6 text-right"><span id="total-items-value">0</span></div>
                        </div>
                        <div class="row d-flex align-items-center justify-content-between">
                            <div class="col-6 text-left">Total:</div>
                            <div class="col-6 text-right"><span id="total-value">0.00</span></div>
                        </div>
                        <button type="submit" class="btn btn-primary checkOutButton mt-3">Check Out</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

<script>
    function updateTotal() {
        let subtotal = 0;
        let totalItems = 0;
        const checkboxes = document.querySelectorAll('.form-check-input:checked');
        checkboxes.forEach(checkbox => {
            const priceText = checkbox.closest('.row').querySelector('.product-price').textContent;
            const price = parseFloat(priceText.replace(/[^\d.]/g, ''));
            const quantity = parseInt(checkbox.closest('.row').querySelector('.quantity-text').textContent);
            subtotal += price * quantity;
            totalItems += quantity;
        });

        const subtotalElement = document.getElementById('subtotal-value');
        subtotalElement.textContent = formatCurrency(subtotal);

        const tax = subtotal * 0.05;
        const taxElement = document.getElementById('tax-value');
        taxElement.textContent = formatCurrency(tax);

        const total = subtotal + tax;
        const totalElement = document.getElementById('total-value');
        totalElement.textContent = formatCurrency(total);

        const totalItemsElement = document.getElementById('total-items-value');
        totalItemsElement.textContent = totalItems.toLocaleString();
    }

    function formatCurrency(amount) {
        return '₱' + amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }

    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('.form-check-input');
        checkboxes.forEach(checkbox => checkbox.addEventListener('change', updateTotal));

        updateTotal();
    });
</script>
