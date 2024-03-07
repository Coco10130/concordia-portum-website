@extends('layouts.navigation')

@section('style')
    <link rel="stylesheet" href="/css/checkOut.css">
@endsection

@section('content')
    <div class="row mt-5" style="margin-left: 30px">
        <div class="col-12 mt-5 d-flex align-items-center">
            <div class="container placeholders">
                <div class="row">
                    <div class="col mb-2">
                        <div class="address d-flex align-items-between">
                            <img src="/images/address.png" alt="">
                            <p class="delivery-tag h4">Delivery Address</p>
                        </div>
                    </div>
                </div>

                <div class="row bottom-row">
                    <div class="col" style="margin: 0 40px">
                        @if ($user->address)
                            <p class="user-address h5">{{ $user->address }} </p>
                        @else
                            <p class="user-address h5">No Address</p>
                        @endif
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <p class="product-tag h4">Product Ordered</p>
                    </div>
                </div>
                @if ($user->address)
                    <form id="placeOrderForm" action="{{ route('place.order') }}" method="POST">
                        @csrf

                        @foreach ($groupedProducts as $shopName => $products)
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="shop mt-2 d-flex align-items-between">
                                        <img src="/images/shop-icon.png" alt="">
                                        <p class="shopName-label">{{ $shopName }}</p>
                                    </div>
                                </div>

                                <div class="col-2 text-center">
                                    <p class="unit-label">Price</p>
                                </div>

                                <div class="col-2 text-center">
                                    <p class="quantity-label">Quantity</p>
                                </div>

                                <div class="col-2 text-center">
                                    <p class="subtotal-label">Subtotal</p>
                                </div>
                            </div>



                            @foreach ($products as $product)
                                <div class="row bottom-row">
                                    <div class="col-6">
                                        <div class="product d-flex align-items-center">
                                            <img src="{{ asset($product->image) }}" alt="Product Image">
                                            <p class="product-name">{{ $product->product_name }}</p>
                                        </div>
                                    </div>
                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                        <p class="price">₱ {{ number_format($product->price, 2) }}</p>
                                    </div>
                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                        <p class="quantity">
                                            @foreach ($product->carts as $cart)
                                                {{ $cart->quantity }}
                                            @endforeach
                                        </p>
                                    </div>
                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                        <p class="subtotal">₱ {{ number_format($product->price * $cart->quantity, 2) }}</p>
                                    </div>
                                </div>
                                <input type="hidden" name="product_ids[]" value="{{ $product->id }}">
                            @endforeach
                        @endforeach


                        <div class="row bottom-row mt-2">
                            <div class="col-3 d-flex align-items-center">
                                <p class="shipping-tag h5"><b>Shipping Option</b></p>
                            </div>
                            <div class="col-3 text-center d-flex justify-content-center align-items-center">
                                <?php
                                $maxDeliveryDate = date('d M', strtotime('+5 days'));
                                $minDeliveryDate = date('d M', strtotime('+3 days'));
                                ?>
                                <p class="shipping-option">Standard Shipping <br> Get by {{ $minDeliveryDate }} -
                                    {{ $maxDeliveryDate }}</p>
                            </div>
                            <div class="col-3 text-center d-flex justify-content-center align-items-center">
                                <p class="shipping-fee">₱ 60</p>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-3 ">
                                <p class="payment-tag h5"><b>Payment Method</b></p>
                            </div>
                            <div class="col-3 text-center d-flex justify-content-center align-items-center">
                                <p class="payment-method">Cash on Delivery</p>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <p class="payment-details"><b>Payment Details</b></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-9 text-left">Merchandise Subtotal</div>
                                    <div class="col-3 text-right">₱ {{ number_format($merchandiseSubtotal, 2) }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-9 text-left">Shipping Fee</div>
                                    <div class="col-3 text-right">₱ {{ number_format($shippingFee, 2) }}</div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="row mb-4">
                                    <div class="col-12"></div>
                                </div>
                                <div class="row">
                                    <div class="col-9 text-left">Total Payment</div>
                                    <div class="col-3 text-right">₱ {{ number_format($totalPayment, 2) }}</div>
                                </div>
                            </div>

                            <div class="col-2">
                                {{-- blank --}}
                            </div>

                            <div class="col-2 d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn btn-outline-secondary">Place Order</button>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="alert alert-danger text-center mt-3" role="alert">
                        Please provide a delivery address before placing an order.
                    </div>
                    <a href="{{ route('profile.index') }}" class="btn btn-outline-secondary ml-2">Go to Profile</a>
                @endif
            </div>
        </div>
    </div>
@endsection
