<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-nadaPink px-6">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md border border-rosewood">

            <!-- Custom Logo -->
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/3.png') }}" alt="NADA ARISSA Logo" style="height:60px; width:auto;">
            </div>

            <h1 class="text-2xl font-bold text-rosewood mb-6 text-center">Admin Login</h1>

            @if ($errors->any())
                <div class="mb-4 text-red-600 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-sm text-rosewood">Email</label>
                    <input type="email" name="email" id="email" required autofocus
                           class="w-full px-4 py-2 border border-rosewood rounded bg-white text-rosewood">
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm text-rosewood">Password</label>
                    <input type="password" name="password" id="password" required
                           class="w-full px-4 py-2 border border-rosewood rounded bg-white text-rosewood">
                </div>

                <button type="submit"
                        class="w-full px-5 py-2 bg-rosewood text-white font-semibold rounded hover:bg-dustyBlush transition">
                    Log In
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>