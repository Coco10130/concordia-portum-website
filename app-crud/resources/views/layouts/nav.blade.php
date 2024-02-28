@section('shopCart')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" crossorigin="anonymous" />
@endsection

<div class="row upper-row">
    <div class="col">
        <header class="fixed-top" style="padding: 8px 0px;">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-4 d-flex align-items-center justify-content-center">
                        <a href="/products" style="text-decoration: none; color:#000000;">
                            <div class="logo d-flex justify-content-center align-items-between">
                                <img class="logo-img" src="/images/cpLogo.png" alt="Logo">
                            </div>
                        </a>
                    </div>

                    <div class="col-4">
                        <div class="mx-auto">
                            <div class="form-floating">
                                <input type="text" class="form-control form-control-sm" id="search"
                                    placeholder="Search">
                                <label for="search">Search</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 d-flex align-items-center justify-content-center">
                        @if(auth()->check())
                            <a class="cart" href="/cart">
                                <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 30px; color: #000000;">
                                    <span id="cartItemCount" class="badge bg-danger"
                                        style="font-size: 11px;">{{ $cartItemsCount }}</span>
                                </i>
                            </a>

                            <a class="profile" href="/profile" class="profile">
                                @if ($user->image)
                                    <img src="{{ asset($user->image) }}" alt="Profile" id="profileImage">
                                @else
                                    <img src="/images/default-picture.png" alt="Profile" id="profileImage">
                                @endif
                            </a>

                            <div class="logout">
                                <form action="{{ route('logout.auth') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-light mt-3" style="border: 1px solid #0000">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        @else
                            <div>
                                <a href="/login" class="btn btn-light">Login</a>
                                <a href="/register" class="btn btn-light">Register</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </header>
    </div>
</div>

