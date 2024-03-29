<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Concordia Portum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @yield('style')
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/navigation.css">
    <link rel="icon" type="image/png" sizes="16x16" href="images/fav-icon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kavoon&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Publico:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<style>
    .body {
        background-image: linear-gradient(to left top, #020202, #3c3c3c, #787878, #b9b9b9, #ffffff);
    }
</style>

<body class="d-flex body flex-column min-vh-100">

    <div class="container-fluid outer-container flex-grow-1">
        @include('layouts.nav')
        {{-- content here --}}

        @yield('content')

    </div>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    @yield('script')
</body>

</html>
