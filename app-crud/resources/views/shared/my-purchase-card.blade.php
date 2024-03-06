<div class="container-fluid placeholders" style="padding: 20px;">
    <div class="row">
        <div class="col">
            <p class="my-profile h2 mt-4">My Purchase</p>
        </div>
    </div>

    @foreach($orders as $order)
    <div class="row mt-5" style="padding: 0 20px">
        <div class="col">
            <div class="row">
                <div class="col-2">
                    <p class="shop-name">{{ $order->shop_name}}</p>
                </div>
                <div class="col-6"></div>
                <div class="col-2 text-center">
                    <p class="quantity-label">Quantity</p>
                </div>
                <div class="col-2 text-center">
                    <p class="price-label">Price</p>
                </div>
            </div>
            <div class="row mb-3 bottom-row">
                <div class="col-8">
                    <div class="product d-flex align-items-center">
                        <img src="{{ asset($order->image) }}" alt="Product Image">
                        <p class="product-text h4">{{ $order->product_name }}</p>
                    </div>
                </div>
                <div class="col-2 d-flex align-items-center justify-content-center">
                    <div class="quantity">
                        <p class="h5 quantity">{{ $order->quantity }}</p>
                    </div>
                </div>
                <div class="col-2 d-flex align-items-center justify-content-center">
                    <div class="price">
                        <p class="h5 price">P {{ number_format($order->price, 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-2 text-center">
            <p class="item">Item: 1</p>
        </div>
        <div class="col-6"></div>
        <div class="col-4 text-center">
            <p class="total-order">Total Price: P {{ number_format($order->quantity * $order->price, 2) }}</p>
        </div>
    </div>
@endforeach

</div>
