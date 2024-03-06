<form action="{{ route('registerSeller') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <h1 class="text-center mb-5" style="font-family: 'oswald'; color: #ffffff;">Shop Information</h1>
    <p style="color: #ffffff; font-family: 'oswald';">Please enter your details about your Shop.</p>

    <div class="row">
        <div class="col">
            <div class="form-floating mb-3 text-center">
                <input type="text" class="form-control @error('shop_name') is-invalid @enderror" id="shop_name"
                    placeholder=" " name="shop_name">
                <label class="form-label-custom" for="shop_name">Shop Name</label>
                @error('shop_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-floating mb-3 text-center">
                <input type="email" class="form-control @error('shop_email') is-invalid @enderror"
                    id="shop_email" placeholder=" " name="shop_email">
                <label class="form-label-custom" for="shop_email">Email Address</label>
                @error('shop_email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-floating mb-3 text-center">
                <input type="tel" class="form-control @error('shop_phone_number') is-invalid @enderror"
                    id="shop_phone_number" placeholder=" " name="shop_phone_number">
                <label class="form-label-custom" for="shop_phone_number">Contact Number</label>
                @error('shop_phone_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-floating d-flex justify-content-start mb-5">
        <input type="submit" name="submit" class="btn text btn-outline-light" value="Save">
        <label for="remember-me" class="text-dark"></label>
    </div>
</form>

<style>
    body {
        background: url('/images/BG1.jpg');
        background-repeat: no-repeat;
        background-position: center;
    }

    .card {
        background-color: rgba(254, 254, 254, 0);
        padding: 23px 50px;
        border-radius: 20px;
        margin-left: 95vh;
        border: 2px solid #ffffff;
    }

    .row .top-nav img {
        margin-right: 15px;
        margin-left: 7vh;
        height: 60px;
        width: 150px;
    }

    .row .top-nav .login-text {
        margin-left: 15px;
    }

    .text,
    .login-text {
        font-family: 'oswald';
    }

    .row .top-nav {
        padding-left: 30px;
        padding-top: 30px;
        margin-bottom: 10px;
        background-color: rgba(255, 255, 255);
        backdrop-filter: blur(10px);
    }

    .row .top-nav .border {
        margin-bottom: 20px;
        height: 70px;
        border-radius: 30px;
        border: 2px solid rgb(255, 255, 255);
    }

    .form-label-custom {
        font-family: 'Constantia', sans-serif;
    }
</style>
