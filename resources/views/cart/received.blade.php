<x-app-layout>
    <div class="bg-nadaPink min-h-screen flex items-center justify-center px-6">
        <div class="bg-white p-8 rounded-lg shadow-md text-center border border-rosewood max-w-md w-full">
            <h1 class="text-2xl font-bold text-rosewood mb-4">Your order is received</h1>
            <p class="text-rosewood mb-6">Thank you for shopping with NADA Arissa. We’ll prepare your items with care.</p>
            <a href="{{ route('dashboard') }}"
               class="inline-block px-6 py-3 bg-dustyBlush text-white font-semibold rounded hover:bg-rosewood transition">
                Back to Dashboard
            </a>
        </div>
    </div>
</x-app-layout>