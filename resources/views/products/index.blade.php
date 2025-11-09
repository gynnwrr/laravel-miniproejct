<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-[#743b3b] text-center mb-8">NEW ARRIVALS</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('storage/' . $product->image) }}"
                         alt="{{ $product->name }}"
                         class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-[#743b3b]">{{ $product->name }}</h2>
                        <p class="text-[#743b3b] mt-1">RM{{ number_format($product->price, 2) }}</p>
                        <a href="{{ route('products.show', $product->id) }}"
                           class="inline-block mt-3 px-4 py-2 bg-[#743b3b] text-white rounded hover:bg-[#D88C9A] transition">
                           View More
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>