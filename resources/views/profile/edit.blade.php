@extends('layouts.app')

@section('content')
<div style="background-color: #FFF5F7; min-height: 100vh; padding: 40px; font-family: 'Segoe UI', sans-serif;">
    <div style="max-width: 800px; margin: 0 auto;">
        <h2 style="font-size: 28px; font-weight: bold; color: #743b3b; margin-bottom: 30px;">Profile</h2>

        <!-- Update Profile Info -->
        <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-bottom: 40px;">
            @include('profile.partials.update-profile-information-form')
        </div>

        <!-- Update Password -->
        <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-bottom: 40px;">
            @include('profile.partials.update-password-form')
        </div>

        <!-- Delete Account -->
        <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
            @include('profile.partials.delete-user-form')
        </div>

        <footer align="center" style="margin-top: 60px; color: #743b3b; font-size: 14px;">
            &copy; DSWE 3 | SEM 5 | JULY '25 | Aida Aina Arissa
        </footer>
    </div>
</div>
@endsection