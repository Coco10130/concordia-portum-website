<form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <h1 class="text-center mb-5" style="font-family: 'Kavoon', cursive;">Registration</h1>

    <div class="row">
        <div class="col">
            <div class="form-floating mb-3 text-center">
                <input type="text" class="form-control @error('userName') is-invalid @enderror" id="user-name" placeholder="Username" name="userName">
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
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email">
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
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
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
                <input type="password" class="form-control" id="confirm-password" placeholder="Confirm Password" name="password_confirmation">
                <label class="form-label-custom" for="confirm-password">Confirm Password</label>
            </div>
        </div>
        
    </div>

    <div class="form-floating d-flex justify-content-center">
        <input type="submit" name="submit" class="btn btn-outline-secondary" value="Register">
        <label for="remember-me" class="text-dark"></label><br>
    </div>
</form>
