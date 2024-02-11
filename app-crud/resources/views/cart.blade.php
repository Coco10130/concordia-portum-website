@extends('layouts.navigation')

@section('style')
    <link rel="stylesheet" href="/css/cart.css">
@endsection

@section('content')
    <div class="row upper-row pd-5 ">
        <div class="col-2 product-col mt-3 d-flex align-items-center justify-content-center" style="padding: 30px 0px;">
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
    </div>

    @foreach ($cartItems as $index => $item)
        <div class="row d-flex justify-content-center">
            <div class="col-2 product-col mt-2 d-flex align-items-center justify-content-center">
                <div class="select mt-2">
                    <input class="form-check-input" type="checkbox" id="checkbox-{{ $index }}" value=""
                        aria-label="...">
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
        </div>
    @endforeach

    <div class="row mt-3 mb-5">
        <div class="col-9">
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
                    <a href="#" class="btn btn-primary mt-3">Checkout</a>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    // Function to update the total
    function updateTotal() {
        let subtotal = 0;
        let totalItems = 0;
        const checkboxes = document.querySelectorAll('.form-check-input:checked');
        checkboxes.forEach(checkbox => {
            const price = parseFloat(checkbox.closest('.row').querySelector('.product-price').textContent.slice(
                2));
            const quantity = parseInt(checkbox.closest('.row').querySelector('.quantity-text').textContent);
            subtotal += price * quantity;
            totalItems += quantity;
        });

        // Update subtotal
        const subtotalElement = document.getElementById('subtotal-value');
        subtotalElement.textContent = formatCurrency(subtotal);

        // Calculate tax
        const tax = subtotal * 0.1;
        const taxElement = document.getElementById('tax-value');
        taxElement.textContent = formatCurrency(tax);

        // Update total
        const total = subtotal + tax;
        const totalElement = document.getElementById('total-value');
        totalElement.textContent = formatCurrency(total);

        // Update total items
        const totalItemsElement = document.getElementById('total-items-value');
        totalItemsElement.textContent = totalItems.toLocaleString();
    }

    // Format currency function
    function formatCurrency(amount) {
        return '₱' + amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }

    // Add event listeners to all checkboxes
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('.form-check-input');
        checkboxes.forEach(checkbox => checkbox.addEventListener('change', updateTotal));

        // Trigger initial calculation
        updateTotal();
    });
</script>
