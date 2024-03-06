<form action="{{ route('registerSeller') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <h1 class="text-center mb-5" style="font-family: 'oswald'; color: #ffffff;">Shop Information</h1>
    <p style="color: #ffffff; font-family: 'oswald';">Please enter your details about your Shop.</p>

    <div class="row">
        <div class="col">
            <div class="form-floating mb-3 text-center">
                <input type="text" class="form-control" id="floatingEmail" placeholder=" " name="shop_name">
                <label class="form-label-custom" for="floatingEmail">Shop Name</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-floating mb-3 text-center">
                <input type="email" class="form-control" id="floatingEmail" placeholder=" " name="shop_email">
                <label class="form-label-custom" for="floatingEmail">Email Address</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-floating mb-3 text-center">
                <input type="" class="form-control" id="floatingEmail" placeholder=" " name="shop_phone_number">
                <label class="form-label-custom" for="floatingEmail">Contact Number</label>
            </div>
        </div>
    </div>

    <div class="form-floating d-flex justify-content-start mb-5">
        <input type="submit" name="submit" class="btn text btn-outline-light" value="Save">
        <label for="remember-me" class="text-dark"></label>
    </div>
</form>
