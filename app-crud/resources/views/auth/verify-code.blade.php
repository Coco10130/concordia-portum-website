@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form action="{{ route('verify.code') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col">
            <div class="form-floating mb-3 text-center">
                <input type="text" name="token" class="form-control" id="fourDigitCode" maxlength="6">
                <label class="form-label-custom" for="fourDigitCode">Code</label>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <a href="{{ route('forgot.password.view') }}">
            <button type="button" class="btn btn-outline-secondary" style="color: #000000; text-decoration: none;">Cancel</button>
        </a>
        <div style="margin-left: 10px;"></div>
        <button type="submit" class="btn btn-outline-secondary" style="color: #000000; text-decoration: none;">Verify</button>
    </div>
</form>
