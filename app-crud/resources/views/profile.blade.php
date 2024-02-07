@extends('layouts.navigation')

@section('style')
    <link rel="stylesheet" href="/css/profile.css">
@endsection

@section('content')
    <div class="row mt-5" style="height: 86vh;">
        <div class="col-2 mt-5 d-flex align-items-center">
            <div class="navigation">
                <ul>
                    <a href="#">My Account</a>
                </ul>
                <ul>
                    <a href="#">My Purchase</a>
                </ul>
                <ul>
                    <a href="#">My Vouchers</a>
                </ul>
            </div>
        </div>

        <div class="col-9 mt-5">
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
                                        <img src="/images/user-profile.jpeg" alt="Profile" id="profileImage">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mt-2 d-flex justify-content-center align-items-center">
                                    <div class="change-profile">
                                        <label for="imageInput" class="upload-btn">
                                            Change Image
                                            <input type="file" id="imageInput" accept="image/*" onchange="uploadImage()"
                                                aria-label="Upload Image">
                                        </label>
                                        <div class="save-button mt-5 d-flex align-items-center justify-content-center">
                                            <button type="button" class="btn btn-light mb-5">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- profile labels --}}
                    <div class="col-2">
                        <div class="container-fluid">
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
                    <div class="col-5 d-flex justify-content-center align-items-center" >
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

                            <div class="row mt-3">
                                <div class="col d-flex justify-content-center align-items-center">
                                    <div class="input-group mb-2">
                                        <input type="number" class="form-control" placeholder="Phone Number"
                                            aria-label="Phone Number">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="male" id="male">
                                        <label class="form-check-label" for="male">
                                            Male
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="male" id="female">
                                        <label class="form-check-label" for="female">
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3 mb-5">
                                <div class="col">
                                    <div class="input-group">
                                        <label class="input-group-text" for="birthday">Birthday:</label>
                                        <input type="date" class="form-control" id="birthday" name="birthday">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col d-flex justify-content-center align-items-end">
                    </div> -->
                </div>
            </div>
        </div>
    </div>
@endsection
