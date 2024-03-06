<form action="{{ route('profile.update', ['profile' => Auth::id()]) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="container-fluid placeholders" style="padding: 20px;">
        <div class="row">
            <div class="col">
                <p class="my-profile h2 mt-4">My Profile</p>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col d-flex justify-content-center align-items-center">
                            <div class="profile-image">
                                @if (isset($user->image) && $user->image != '')
                                    <img src="{{ asset($user->image) }}" alt="Profile" id="profileImage">
                                @else
                                    <img src="/images/profiles/default-picture.png" alt="Profile" id="profileImage">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mt-2 d-flex justify-content-center align-items-center">

                            <div class="change-profile">
                                {{-- change profile pic --}}
                                <label for="imageInput" class="upload-btn">
                                    Change Image
                                    <input type="file" id="imageInput" name="image" accept="image/*">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- profile labels --}}
            <div class="col-8">
                <div class="row mt-5">
                    <div class="col-4 d-flex justify-content-center align-items-center">
                        <p class="user-name">Username:</p>
                    </div>
                    <div class="col d-flex justify-content-start align-items-center">
                        <p class="user-name">{{ $user->userName }}</p>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-4 d-flex justify-content-center align-items-center">
                        <p class="user-name">Email:</p>
                    </div>
                    <div class="col d-flex justify-content-start align-items-center">
                        <p class="user-name">{{ $user->email }}</p>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-4 d-flex justify-content-center align-items-center">
                        <p class="user-name">Phone Number:</p>
                    </div>
                    <div class="col d-flex justify-content-start align-items-center">
                        @if (!$user->phoneNumber)
                            <input type="price_number" class="form-control @error('phoneNumber') is-invalid @enderror"
                                name="phoneNumber">
                            @error('phoneNumber')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        @else
                            <p class="user-name">{{ $user->phoneNumber }}</p>
                        @endif
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-4 d-flex justify-content-center align-items-center">
                        <p class="user-name">Address:</p>
                    </div>
                    <div class="col d-flex justify-content-start align-items-center">
                        @if (!$user->address)
                            <input type="price_number" class="form-control @error('address') is-invalid @enderror"
                                name="address">
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        @else
                            <p class="user-name">{{ $user->address }}</p>
                        @endif
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-4 d-flex justify-content-center align-items-center">
                        <p class="user-name">Gender:</p>
                    </div>
                    <div class="col d-flex justify-content-start align-items-center">
                        @if (!$user->gender)
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio"
                                        name="gender" value="male" id="male">
                                    <label class="form-check-label" for="male">
                                        Male
                                    </label>
                                    @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="female"
                                        id="female">
                                    <label class="form-check-label" for="female">
                                        Female
                                    </label>
                                </div>
                            </div>
                    </div>
                @else
                    <p class="user-name mt-1">{{ $user->gender }}</p>
                    @endif
                </div>

                <div class="row mt-3">
                    <div class="col-4 d-flex justify-content-center align-items-center">
                        <p class="user-name">Birthday:</p>
                    </div>
                    <div class="col d-flex justify-content-start align-items-center">
                        @if (!$user->birthDate)
                            <input type="date" class="form-control @error('birthDay') is-invalid @enderror"
                                id="birthday" name="birthDate" max="{{ date('Y-m-d') }}">
                            @error('birthDay')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        @else
                            <p class="user-name mt-1">{{ $user->birthDate }}</p>
                        @endif
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-11">
                        <div class="form-floating d-flex justify-content-end">
                            <input type="submit" name="submit" class="btn btn-outline-secondary" value="Save">
                            <label for="remember-me" class="text-dark"></label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>

<script>
    function displayImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.querySelector('.profile-image img').src = e.target.result;
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    document.getElementById('imageInput').addEventListener('change', function() {
        displayImage(this);
    });
</script>
