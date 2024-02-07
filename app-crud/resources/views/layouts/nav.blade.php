@section('shopCart')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" crossorigin="anonymous" />
@endsection

<div class="row upper-row">
    <div class="col">
        <header class="fixed-top" style="padding: 8px 0px;">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-3 d-flex align-items-center justify-content-end">
                        <a href="/products" style="text-decoration: none; color:#000000;">
                            <h3 class="logo">Concordia Portum</h3>
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
                        <a class="cart" href="/cart">
                            <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 30px; color: #000000;"> <span
                                    class="badge bg-danger" style="font-size: 11px;">0</span></i>
                        </a>

                        <a  class="profile" href="/profile" class="profile"><img src="/images/user-profile.jpeg"
                            class="user-image" alt="profile"></a>
                    </div>
                </div>
            </div>
        </header>
    </div>

</div>
