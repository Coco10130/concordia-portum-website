<form action="{{ route('reset.password.post') }}" method="POST">
    @csrf
    <input type="text" name="token" hidden value="{{ $token }}">

    <div class="row">
        <div class="col">
            <div class="form-floating mb-3 text-center">
                <input type="email" class="form-control" id="floatingPassword" placeholder="Password" name="email">
                <label class="form-label-custom" for="floatingPassword">Email</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-floating mb-3 text-center">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label class="form-label-custom" for="floatingPassword">New Password</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-floating mb-3 text-center">
                <input type="password" class="form-control" id="floatingConfirmPassword"
                    placeholder="Confirm Password" name="password_confirmation">
                <label class="form-label-custom" for="floatingConfirmPassword">Confirm Password</label>
            </div>
        </div>
    </div>


    <div class="d-flex justify-content-end">
        <a href="#">
            <button type="button" class="btn btn-outline-secondary"
                style="color: #000000; text-decoration: none;">Cancel</button>
        </a>
        <div style="margin-left: 10px;"></div>
        <input type="submit" class="btn btn-outline-secondary" value="Login" name="submit">
        <label for="remember-me" class="text-dark"></label>
    </div>
</form>