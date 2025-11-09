<x-app-layout>
    <!-- Toast Notification -->
    <div x-data="{ show: {{ session('quantity_updated') ? 'true' : 'false' }} }"
         x-show="show"
         x-init="setTimeout(() => show = false, 3000)"
         class="fixed top-6 right-6 bg-rosewood text-white px-4 py-2 rounded shadow-lg transition duration-300"
         style="display: none;">
        Quantity updated successfully.
    </div>

    <div class="bg-nadaPink min-h-screen py-12 px-6">
        <div class="max-w-xl mx-auto">
            <h1 class="text-3xl font-bold text-rosewood text-center mb-8 tracking-wide">Your Cart</h1>

            @if (count($cart) > 0)
                <ul class="space-y-6">
                    @foreach ($cart as $item)
                        <li class="bg-white p-6 rounded-lg shadow-md border border-rosewood">
                            <h2 class="text-lg font-semibold text-rosewood">{{ $item['name'] }}</h2>
                            <p class="text-rosewood mb-4">RM{{ number_format($item['price'], 2) }}</p>

                            <!-- Quantity Update -->
                            <form method="POST" action="{{ route('cart.update', $item['id']) }}" class="flex items-center gap-4">
                                @csrf
                                @method('PATCH')
                                <label for="quantity_{{ $item['id'] }}" class="text-sm text-rosewood">Qty:</label>
                                <input type="number" name="quantity" id="quantity_{{ $item['id'] }}"
                                       value="{{ $item['quantity'] }}" min="1"
                                       class="w-20 px-3 py-2 border border-rosewood rounded text-rosewood focus:outline-none focus:ring-2 focus:ring-dustyBlush">
                                <button type="submit"
                                        class="px-4 py-2 bg-rosewood text-white rounded hover:bg-dustyBlush transition">
                                    Update
                                </button>
                            </form>

                            <!-- Remove Item -->
                            <form method="POST" action="{{ route('cart.remove', $item['id']) }}" class="mt-4 text-right">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-sm text-dustyBlush hover:underline">
                                    Remove
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>

                <!-- Clear Cart -->
                <form method="POST" action="{{ route('cart.clear') }}" class="mt-8 text-center">
                    @csrf
                    <button type="submit"
                            class="px-6 py-3 bg-rosewood text-white font-semibold rounded hover:bg-dustyBlush transition duration-300">
                        Clear Cart
                    </button>
                </form>

                <!-- Checkout Button -->
                <div class="text-center">
                    <a href="{{ route('checkout') }}"
                       class="mt-4 inline-block px-6 py-3 bg-dustyBlush text-white font-semibold rounded hover:bg-rosewood transition duration-300">
                        Proceed to Checkout
                    </a>
                </div>
            @else
                <p class="text-center text-rosewood text-base mt-4">Your cart is empty.</p>
            @endif
        </div>
    </div>
</x-app-layout>