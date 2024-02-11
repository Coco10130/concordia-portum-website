<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Submit Information</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
            crossorigin="anonymous">
        <link rel="stylesheet" href="/css/shopinfo.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kavoon&display=swap">
        <link href="https://fonts.googleapis.com/css2?family=Publico:wght@300;400;700&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="container-fluid d-flex justify-content-center align-items-center" style="padding: 23px 0px; height: 100vh;">
            <div class="card w-50 mx-auto p-4">
                {{-- content goes here --}}
                @include('shared.register-shop')
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" 
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" 
            crossorigin="anonymous"></script>
    </body>
</html>