<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NADA Arissa | Login</title>
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
        .login-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-bottom: 60px; /* space for footer */
        }
        .logo-img {
            max-width: 150px;
            height: auto;
            margin-bottom: 1.5rem;
        }
        .login-card {
            background-color: white;
            border: 1px solid #E5E5E5;
            border-radius: 10px;
            padding: 2rem;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        label {
            color: #743b3b;
            font-weight: 500;
        }
        input[type="email"],
        input[type="password"] {
            border: 1px solid #D88C9A;
            background-color: #FFF5F7;
            color: #743b3b;
        }
        input:focus {
            border-color: #743b3b;
            box-shadow: 0 0 0 0.2rem rgba(116, 59, 59, 0.25);
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
        .text-sm {
            color: #743b3b;
        }
        .text-sm:hover {
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
    <div class="login-wrapper">
        <!-- Logo -->
        <img src="{{ asset('images/2.png') }}" alt="NADA ARISSA Logo" class="logo-img">

        <!-- Login Card -->
        <div class="login-card">
            @if (session('status'))
                <div class="alert alert-success mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" class="form-control mt-1" value="{{ old('email') }}" required autofocus autocomplete="username">
                    @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" class="form-control mt-1" required autocomplete="current-password">
                    @error('password')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="form-check mb-3">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label">Remember me</label>
                </div>

                <!-- Actions -->
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column">
                        @if (Route::has('password.request'))
                            <a class="text-sm text-decoration-none mb-1" href="{{ route('password.request') }}">
                                Forgot your password?
                            </a>
                        @endif

                        <a class="text-sm text-decoration-none" href="{{ route('register') }}">
                            Haven't registered?
                        </a>
                    </div>

                    <button type="submit" class="btn-theme">
                        Log in
                    </button>
                </div>
            </form>
        </div>
    </div>

    <footer>
        &copy; DSWE 3 | SEM 5 | JULY '25 | Aida Aina Arissa
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>