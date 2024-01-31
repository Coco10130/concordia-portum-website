<form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <h1 class="text-center mb-5" style="font-family: 'Kavoon', cursive;">Registration</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-3 mt-3 text-center">
                <input type="text" class="form-control" id="firstName" placeholder="First" name="firstName">
                <label class="form-label-custom" for="firstName">First Name</label>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating mb-3 mt-3 text-center">
                <input type="text" class="form-control" id="lastName" placeholder="Last" name="lastName">
                <label class="form-label-custom" for="lastName">Last Name</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-floating mb-3 text-center">
                <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
                <label class="form-label-custom" for="email">Email</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-floating mb-3 text-center">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                <label class="form-label-custom" for="password">Password</label>
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
        <input type="submit" name="submit" class="btn btn-outline-secondary" value="submit">
        <label for="remember-me" class="text-dark"></label><br>
    </div>
</form>