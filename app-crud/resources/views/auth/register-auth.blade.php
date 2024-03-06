<form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <h1 class="text-center mb-5" style="font-family: 'oswald'; color: #ffffff;">Registration</h1>

    <div class="row">
        <div class="col">
            <div class="form-floating mb-3 text-center">
                <input type="text" class="form-control @error('userName') is-invalid @enderror" id="user-name" placeholder=" " name="userName" value="{{ old('userName') }}">
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
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder=" " name="email" value="{{ old('email') }}">
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
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder=" " name="password">
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
                <input type="password" class="form-control @error('confirn-password') is-invalid @enderror" id="confirm-password" placeholder=" " name="password_confirmation">
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
