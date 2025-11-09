<x-app-layout>
    <div class="bg-nadaPink min-h-screen py-16 px-6">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row md:gap-20 gap-10">
            <!-- Order Summary First -->
            <div class="flex-1 md:max-w-[400px]">
                <h2 class="text-xl font-bold text-rosewood mb-6">Order Summary</h2>

                @php $total = 0; @endphp

                <div class="space-y-4">
                    @foreach ($cart as $item)
                        @php
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                        @endphp
                        <div class="bg-white p-4 rounded border border-rosewood shadow-sm flex justify-between text-rosewood">
                            <span>{{ $item['name'] }} × {{ $item['quantity'] }}</span>
                            <span>RM{{ number_format($subtotal, 2) }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6 pt-4 border-t border-rosewood flex justify-between text-rosewood font-semibold text-base">
                    <span>Total</span>
                    <span>RM{{ number_format($total, 2) }}</span>
                </div>
            </div>

            <!-- Shipping Details Second -->
            <div class="flex-1 md:max-w-[500px]">
                <h2 class="text-xl font-bold text-rosewood mb-6">Shipping Details</h2>
                <form method="POST" action="#">
                    @csrf

                    <div class="space-y-5">
                        <div>
                            <label for="name" class="block text-sm text-rosewood">Full Name</label>
                            <input type="text" id="name" name="name" required
                                   class="w-full px-4 py-2 border border-rosewood rounded bg-white text-rosewood focus:ring-dustyBlush focus:outline-none">
                        </div>

                        <div>
                            <label for="email" class="block text-sm text-rosewood">Email</label>
                            <input type="email" id="email" name="email" required
                                   class="w-full px-4 py-2 border border-rosewood rounded bg-white text-rosewood focus:ring-dustyBlush focus:outline-none">
                        </div>

                        <div>
                            <label for="address" class="block text-sm text-rosewood">Shipping Address</label>
                            <textarea id="address" name="address" rows="3" required
                                      class="w-full px-4 py-2 border border-rosewood rounded bg-white text-rosewood focus:ring-dustyBlush focus:outline-none"></textarea>
                        </div>

                        <div>
                            <label for="notes" class="block text-sm text-rosewood">Order Notes (optional)</label>
                            <textarea id="notes" name="notes" rows="2"
                                      class="w-full px-4 py-2 border border-rosewood rounded bg-white text-rosewood focus:ring-dustyBlush focus:outline-none"></textarea>
                        </div>

                        <button type="submit"
                                class="w-full mt-2 px-5 py-2 bg-rosewood text-white font-semibold rounded hover:bg-dustyBlush transition">
                            Place Order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>