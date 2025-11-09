<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NADA Arissa | Confirm Password</title>
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
        .confirm-wrapper {
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
        .confirm-card {
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
    <div class="confirm-wrapper">
        <!-- Logo -->
        <img src="{{ asset('images/2.png') }}" alt="NADA ARISSA Logo" class="logo-img">

        <!-- Confirm Card -->
        <div class="confirm-card">
            <div class="mb-4 text-sm" style="color: #743b3b;">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password -->
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" class="form-control mt-1" required autocomplete="current-password">
                    @error('password')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn-theme">
                        {{ __('Confirm') }}
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