<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NADA Arissa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        .left-panel {
            background-color: #FFF5F7; /* Blush pink */
            color: #743b3b;
        }
        .right-panel {
            background-color: #743b3b; /* Darker tone */
            color: #FFF5F7;
        }
        .btn-blush {
            background-color: #FFF5F7;
            border: 2px solid #FFF5F7;
            color: #743b3b;
        }
        .btn-blush:hover {
            background-color: #743b3b;
            color: #FFF5F7;
        }
        .logo-img {
            max-width: 80%;
            height: auto;
        }
        .quote-text {
            font-size: 1.5rem;
            font-style: italic;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <!-- Left Panel-->
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center left-panel">
                <img src="{{ asset('images/1.png') }}" alt="NADA ARISSA Logo" class="logo-img mb-3">
            </div>

            <!-- Right Panel: Quote and Buttons -->
            <div class="col-md-6 position-relative d-flex flex-column justify-content-center align-items-center right-panel text-center">
                <h1 class="mb-4 quote-text" style="color: #FFF5F7;">"where modesty meets timeless elegance"</h1>
                <div class="d-grid gap-3 col-6 mx-auto">
                    <a href="{{ route('login') }}" class="btn btn-blush btn-lg">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-blush btn-lg">Register</a>
                </div>
                <div class="position-absolute bottom-0 mb-3">
                    <small class="text-light">&copy; DSWE 3 | SEM 5 | JULY '25 | Aida Aina Arissa</small>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>