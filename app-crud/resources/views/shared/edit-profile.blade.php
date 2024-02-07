<form action="{{ route('profile.update', ['profile' => Auth::id()]) }}" method="POST" enctype="multipart/form-data">
    @csrf

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
                        <input type="number" class="form-control" placeholder="Phone Number" aria-label="Phone Number" name="phoneNumber">
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
                        <input class="form-check-input" type="radio" name="gender" value="male" id="male">
                        <label class="form-check-label" for="male">
                            Male
                        </label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="female" id="female">
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
                    <input type="date" class="form-control" id="birthday" name="birthDate">
                @else
                    <p class="user-name">{{ $user->birthDate }}</p>
                @endif
            </div>
        </div>
    </div>

    <div class="form-floating d-flex justify-content-start mb-5">
        <input type="submit" name="submit" class="btn btn-outline-secondary" value="Save">
        <label for="remember-me" class="text-dark"></label>
    </div>
</form>
