

<form action="{{ route('forgot.password') }}" method="post">
    @csrf
    <div class="row">
        <div class="col">
            <div class="form-floating mb-3 text-center">
                <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com" name="email">
                <label class="form-label-custom" for="floatingEmail">Email Address</label>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <a href="/login">
            <button type="button" class="btn btn-outline-secondary" style="color: #000000; text-decoration: none;">Cancel</button>
        </a>
        <div style="margin-left: 10px;"></div>
        <input type="submit" class="btn btn-outline-secondary" value="Send Verification Code" name="submit">
        <label for="remember-me" class="text-dark"></label>
    </div>
</form>
