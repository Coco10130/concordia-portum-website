@extends('layouts.navigation')

@section('content')
    <div class="row align-items-center justify-content-center">
        <div class="col-10">
            @include('layouts.carousel')
        </div>
    </div>
    <div class="row">
        <div class="col-2 navigation d-flex justify-content-center align-items-center" style="height: 50vh; margin-top: 10vh;">
            <!-- navigation.blade.php -->

            @include('shared.category-nav')


        </div>
        <div class="col d-flex justify-content-center align-items-center">
            <div class="product-container" style="padding-top: 50px;">
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row product-row" style="margin-left: 60px">
                    <div class="col">
                        <div class="row d-flex justify-content-between align-items-center mb-5">
                            {{-- Display products based on active category --}}
                            @if (isset($category))
                                @include('categories.' . $category)
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
