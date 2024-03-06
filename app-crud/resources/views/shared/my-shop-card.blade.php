<div class="container-fluid placeholders" style="padding: 20px;">
    <div class="row">
        <div class="col">
            <p class="my-profile h2 mt-4">My Shop</p>
        </div>
    </div>
    @if ($user->is_seller)
        <div class="row mt-5">
            <div class="col-1 d-flex justify-content-center align-items-center">
                <div class="container-fluid">
                    {{-- blank --}}
                </div>
            </div>


            {{-- profile labels --}}
            <div class="col-4">
                <div class="container-fluid">
                    <div class="row mt-5">
                        <div class="col d-flex justify-content-end align-items-center">
                            <p class="user-name">Shop Name:</p>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col d-flex justify-content-end align-items-center">
                            <p class="user-name">Shop Email:</p>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col d-flex justify-content-end align-items-center">
                            <p class="user-name">Shop Phone Number:</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- profile details --}}
            <div class="col-5 mb-3 d-flex justify-content-start align-items-center">
                {{-- profile content goes here --}}
                @include('shared.shop-profile')
            </div>
        </div>

        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center" >
                @include('shared.create')
            </div>
        </div>
    @else
        <p class="btn-holder mt-5 d-flex justify-content-center align-items-center"> <a href="/register-seller"
                class="btn btn-outline-secondary">
                Register as Seller
            </a>
        </p>
    @endif
</div>