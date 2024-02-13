<form action="{{ route('login.auth') }}" method="post" enctype="multipart/form-data">
    @csrf

    <h1 class="text-center mb-5" style="font-family: 'Kavoon', cursive;">Login</h1>

    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
        <label class="form-label-custom" for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        <label class="form-label-custom" for="floatingPassword">Password</label>
    </div>

    <div class="text-end mb-3 mt-3">
        <a class="forgot-pass" href="{{ route('forgot.password.view') }}" style="text-decoration: none; color: #000000;">Forgot Password</a>
    </div>

    <div class="form-floating mt-3 d-flex justify-content-center">
        <input type="submit" class="btn btn-outline-secondary" value="Login" name="submit">
        <label for="remember-me" class="text-dark"></label>
    </div>
    @if (isset($message))
        <div class="alert alert-danger mt-4">{{ $message }}</div>
    @endif
</form>
