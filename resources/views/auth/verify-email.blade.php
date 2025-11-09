<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NADA Arissa | Verify Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FFF5F7;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            position: relative;
        }
        .verify-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-bottom: 60px;
        }
        .logo-img {
            max-width: 150px;
            height: auto;
            margin-bottom: 1.5rem;
        }
        .verify-card {
            background-color: white;
            border: 1px solid #E5E5E5;
            border-radius: 10px;
            padding: 2rem;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            text-align: center;
        }
        .text-maroon {
            color: #743b3b;
        }
        .btn-theme {
            background-color: #743b3b;
            color: #FFF5F7;
            border: 2px solid #743b3b;
            padding: 0.5rem 1.25rem;
            border-radius: 0.375rem;
            font-weight: 600;
        }
        .btn-theme:hover {
            background-color: #D88C9A;
            border-color: #D88C9A;
            color: white;
        }
        .text-sm a {
            color: #743b3b;
            text-decoration: underline;
        }
        .text-sm a:hover {
            color: #D88C9A;
        }
        footer {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
            font-size: 0.85rem;
            color: #743b3b;
        }
    </style>
</head>
<body>
    <div class="verify-wrapper">
        <!-- Logo -->
        <img src="{{ asset('images/2.png') }}" alt="NADA ARISSA Logo" class="logo-img">

        <!-- Verification Card -->
        <div class="verify-card">
            <div class="mb-4 text-sm text-maroon">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-success">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="d-flex justify-content-between mt-4">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn-theme">
                        {{ __('Resend Verification Email') }}
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link text-sm">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>

    <footer>
        &copy; DSWE 3 | SEM 5 | JULY '25 | Aida Aina Arissa
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>