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
        <link rel="icon" type="image/png" sizes="16x16" href="images/fav-icon.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kavoon&display=swap">
        <link href="https://fonts.googleapis.com/css2?family=Publico:wght@300;400;700&display=swap" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    </head>

    <body>
        <div class="container-fluid"
        style="height: 100vh;">
        <div class="row">
            <div class="col-4 top-nav">
                <div class="logo d-flex align-items-center jusrify-content-between">
                    <img src="/images/cpLogo.png" alt="Logo">
                    <div class="border"></div>
                    <p class="h3 login-text">Register Seller</p>
                </div>
            </div>
            <div class="col top-nav">

            </div>
        </div>
        <div class="row mt-5">
            <div class="col d-flex justify-content-center">
                <div class="card w-40">
                    @include('shared.register-shop')

                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid">

    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" 
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" 
            crossorigin="anonymous"></script>
    </body>
</html>