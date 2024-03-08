<div class="container-fluid placeholderss" style="padding: 20px;">
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
            <div class="col-12 d-flex justify-content-center align-items-center">
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

<style>
    .navigation-col,
    .test {
        border: 1px solid blue;
    }

    .navigation a {
        color: rgb(0, 0, 0);
        text-decoration: none;
        transition: color 0.3s ease-in-out;
    }

    .navigation ul {
        margin: 30px 0px;
    }

    .placeholders {
        background-color: #c7c7c7;
        border-radius: 30px;
    }

    .profile-image img {
        height: 100px;
        width: 100px;
        border-radius: 50px;
    }

    .upload-btn {
        display: inline-block;
        padding: 10px;
        color: #000000;
        background-color: #fff;
        cursor: pointer;
        border-radius: 15px;
    }

    .upload-btn input {
        display: none;
    }

    .upload-btn input::before {
        content: "";
        display: none;
    }

    .my-profile {
        margin-left: 40px;
    }

    .upload-btn {
        padding: 15px 15px;
        font-size: 13px;
    }

    .btn {
        padding: 8px 28px;
    }

    .input-group input,
    .input-group-text,
    .form-check {
        font-size: 14px;
    }

    .navigation ul a,
    .my-profile,
    .upload-btn,
    .input-group input,
    .input-group-text,
    .form-check {
        font-family: 'oswald';
    }

    .user-name,
    .upload-btn,
    .btn {
        font-family: 'poppins';
    }

    .navigation ul a:hover {
        color: #fff;
        background-color: #3eb489;
    }

    .navigation ul a {
        transition: .3s ease-in-out;
        border-radius: 30px;
        padding: 6px 6px;
    }

    .my-profile {
        border-bottom: 2px solid rgb(0, 0, 0);
        width: 90%;
    }

    .navigation a[href="/profile"].active,
    .navigation a[href="/profile"]:hover,
    .navigation a[href="/my-shop"].active,
    .navigation a[href="/my-shop"]:hover,
    .navigation a[href="/my-purchases"].active,
    .navigation a[href="/my-purchases"]:hover {
        color: #fff;
        background-color: #3eb489;
    }
</style>
