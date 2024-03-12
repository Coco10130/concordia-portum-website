<form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <h1 class="text-center mb-5" style="font-family: 'oswald'; color: #ffffff;">Registration</h1>

    <div class="row">
        <div class="col">
            <div class="form-floating mb-3 text-center">
                <input type="text" class="form-control @error('userName') is-invalid @enderror" id="user-name"
                    placeholder=" " name="userName" value="{{ old('userName') }}">
                <label class="form-label-custom" for="user-name">Username</label>
                @error('userName')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-floating mb-3 text-center">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    placeholder=" " name="email" value="{{ old('email') }}">
                <label class="form-label-custom" for="email">Email</label>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-floating mb-3 text-center">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    placeholder=" " name="password">
                <label class="form-label-custom" for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-floating mb-3 text-center">
                <input type="password" class="form-control @error('confirn-password') is-invalid @enderror"
                    id="confirm-password" placeholder=" " name="password_confirmation">
                <label class="form-label-custom" for="confirm-password">Confirm Password</label>
                @error('confirm-password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-floating d-flex justify-content-center">
        <input type="submit" name="submit" class="btn text btn-outline-light" value="Register">
        <label for="remember-me" class="text-dark"></label><br>
    </div>
</form>

<style>
    body {
        background-image: linear-gradient(to left bottom, #2e2e2f, #5c5c5d, #8f8f90, #c6c6c6, #ffffff);
    }

    .card {
        background-color: rgba(254, 254, 254, 0);
        padding: 23px 50px;
        border-radius: 20px;
        margin-left: 95vh;
        border: 2px solid #ffffff;
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

    .text,
    .login-text {
        font-family: 'oswald';
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

    .form-label-custom {
        font-family: 'Constantia', sans-serif;
    }

    .form-control {
        border-radius: 20px;
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
