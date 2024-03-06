@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('forgot.password') }}" method="post">
    @csrf
    <div class="row">
        <div class="col">
            <div class="form-floating mb-3 text-center">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingEmail" placeholder=" " name="email">
                <label class="form-label-custom" for="floatingEmail">Email Address</label>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <a href="/login">
            <button type="button" class="btn text btn-outline-secondary"
                style="color: #fffbfb; text-decoration: none;">Cancel</button>
        </a>
        <div style="margin-left: 10px;"></div>
        <input type="submit" class="btn text btn-outline-light" value="Send Verification Code" name="submit">
        <label for="remember-me" class="text-dark"></label>
    </div>
</form>
