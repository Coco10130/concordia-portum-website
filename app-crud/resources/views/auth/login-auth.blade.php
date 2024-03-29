<form action="{{ route('login.auth') }}" method="post" enctype="multipart/form-data">
    @csrf

    <h1 class="text-center mb-5" style="font-family: 'oswald'; color: #ffffff;">Login</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder=" " name="email">
        <label class="form-label-custom" for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder=" " name="password">
        <label class="form-label-custom" for="floatingPassword">Password</label>
    </div>

    <div class="text-end mb-3 mt-3">
        <a class="forgot-pass text" href="{{ route('forgot.password.view') }}"
            style="text-decoration: none; color: #ffffff;">Forgot Password</a>
    </div>

    <div class="form-floating mt-3 d-flex justify-content-center">
        <input type="submit" class="btn text btn-outline-light" value="Login" name="submit">
        <label for="remember-me" class="text-dark"></label>
    </div>
    @if (isset($message))
        <div class="alert alert-danger mt-4">{{ $message }}</div>
    @endif
</form>

<style>
    body {
        background-image: linear-gradient(to left bottom, #2e2e2f, #5c5c5d, #8f8f90, #c6c6c6, #ffffff);
    }

    .card {
        margin-top: 7vh;
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
        border: 5px solid rgb(0, 0, 0);
    }

    .form-floating #floatingInput {
        background: url('/images/person-icon.png') no-repeat left center;
        background-color: #ffffff;
        background-size: 15px;
        border-radius: 20px;
        padding-left: 36px !important;
    }

    .form-floating #floatingPassword {
        background: url('/images/password-icon.png') no-repeat left center;
        background-color: #ffffff;
        background-size: 15px;
        border-radius: 20px;
        padding-left: 36px !important;
    }

    .form-floating #floatingInput,
    .form-floating #floatingPassword {
        background-position: left 10px center;
    }

    .form-floating label {
        margin-left: 24px;
    }

    .btn {
        width: 100px;
    }

    .form-label-custom {
        font-family: 'Constantia', sans-serif;
    }

    @media only screen and (max-width: 767px) {
        .card {
            margin-right: 0;
            margin-left: 0;
            padding: 15px;
            border: none;
            background-color: #ffffff00;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 2px solid #ffffff;
        }

        .row .top-nav img {
            height: 60px;
            width: 60px;
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 1023px) {
        .card {
            margin-right: 0;
            /* Adjust margins for tablet */
            margin-left: 0;
            /* Adjust margins for tablet */
            padding: 20px;
            /* Adjust padding for tablet */
        }

        .row .top-nav img {
            height: 50px;
            /* Adjust height of the logo for tablet */
            width: auto;
            /* Allow the width to adjust automatically */
        }
    }

    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 1) {
        .card {
            margin-right: 0;
            /* Adjust margins for tablet */
            margin-left: 0;
            /* Adjust margins for tablet */
            padding: 20px;
            /* Adjust padding for tablet */
        }

        .row .top-nav img {
            height: 50px;
            /* Adjust height of the logo for tablet */
            width: auto;
            /* Allow the width to adjust automatically */
        }
    }

    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {

        .card {
            margin-right: 0;
            /* Adjust margins for tablet */
            margin-left: 0;
            /* Adjust margins for tablet */
            padding: 20px;
            /* Adjust padding for tablet */
        }

        .row .top-nav img {
            height: 50px;
            /* Adjust height of the logo for tablet */
            width: auto;
            /* Allow the width to adjust automatically */
        }
        @media only screen and (min-width: 1024px) {
            .card {
            margin-right: 0;
            /* Adjust margins for tablet */
            margin-left: 0;
            /* Adjust margins for tablet */
            padding: 20px;
            /* Adjust padding for tablet */
        }

        .row .top-nav img {
            height: 50px;
            /* Adjust height of the logo for tablet */
            width: auto;
            /* Allow the width to adjust automatically */
        }
    }
</style>
