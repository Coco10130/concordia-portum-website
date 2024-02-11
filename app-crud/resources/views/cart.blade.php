@extends('layouts.navigation')

@section('style')
    <link rel="stylesheet" href="/css/cart.css">
@endsection

@section('content')
<div class="row upper-row">
    <div class="col-2 product-col mt-3 d-flex align-items-center justify-content-center" style="padding: 30px 0px;">
        <div class="select-all">
            <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
        </div>
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

<div class="row d-flex justify-content-center">
    <div class="col-2 product-col mt-2 d-flex align-items-center justify-content-center">
        <div class="select mt-2">
            <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
        </div>
    </div>

    <div class="col-4 product-col mt-2" style="padding: 8px 30px;">
        <div class="product-item d-flex align-items-center">
            <img src="/images/sample-image.jpg" alt="Product Image">
            <p class="product-name h5">Item 1</p>
        </div>
    </div>

    <div class="col-2 product-col mt-2 d-flex align-items-center justify-content-center">
        <p class="product-price">₱ 6,900</p>
    </div>

    <div class="col-2 product-col mt-2 d-flex align-items-center justify-content-center">
        <div class="quantity-input">
            <label class="quantity-text" for="quantity">Enter Quantity</label>
            <input type="number" id="quantity" name="quantity" min="1" max="99">
        </div>
    </div>

    <div class="col-2 product-col mt-2 d-flex align-items-center justify-content-center">
        <p class="total-price">total price</p>
    </div>
</div>

@endsection