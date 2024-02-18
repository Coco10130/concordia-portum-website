<form action="{{ route('profile.update', ['profile' => Auth::id()]) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="container-fluid placeholders">
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
                                @if (isset($user->image))
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
            <div class="col-2">
                <div class="container-fluid pb-5">
                    <div class="row mt-5">
                        <div class="col d-flex justify-content-end align-items-center">
                            <p class="user-name">Username:</p>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col d-flex justify-content-end align-items-center">
                            <p class="user-name">Email:</p>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col d-flex justify-content-end align-items-center">
                            <p class="user-name">Phone Number:</p>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col d-flex justify-content-end align-items-center">
                            <p class="user-name">Gender:</p>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col d-flex justify-content-end align-items-center">
                            <p class="user-name">Birthday:</p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- profile details --}}
            <div class="col-3 d-flex justify-content-start align-items-center">

                <div class="container-fluid">
                    <div class="row mt-5">
                        <div class="col d-flex justify-content-start align-items-center">
                            <p class="user-name">{{ $user->userName }}</p>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col d-flex justify-content-center align-items-center">
                            <div class="input-group mb-2">
                                <p class="user-name">{{ $user->email }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col d-flex justify-content-center align-items-center">
                            <div class="input-group mb-2">
                                @if (!$user->phoneNumber)
                                    <input type="price_number"
                                        class="form-control @error('phoneNumber') is-invalid @enderror"
                                        name="phoneNumber">
                                    @error('phoneNumber')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                @else
                                    <p class="user-name">{{ $user->phoneNumber }}</p>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="row mt-2">
                        @if (!$user->gender)
                            <div class="col-4">
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
                    <p class="user-name">{{ $user->gender }}</p>
                    @endif

                    <div class="row mt-3 mb-5">
                        <div class="col">
                            @if (!$user->birthDate)
                                <input type="date" class="form-control @error('birthDay') is-invalid @enderror"
                                    id="birthday" name="birthDate" max="{{ date('Y-m-d') }}">
                                @error('birthDay')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @else
                                <p class="user-name">{{ $user->birthDate }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-floating d-flex justify-content-start mb-5">
                                <input type="submit" name="submit" class="btn btn-outline-secondary" value="Save">
                                <label for="remember-me" class="text-dark"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    // Function to display selected image
    function displayImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.querySelector('.profile-image img').src = e.target.result;
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Attach change event listener to file input
    document.getElementById('imageInput').addEventListener('change', function() {
        displayImage(this);
    });
</script>
