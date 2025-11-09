<x-app-layout>
    <div class="py-8 px-6">
        <h1 class="text-3xl font-bold text-rosewood mb-6">Product Management</h1>

        @if (session('success'))
            <div class="mb-4 text-green-600 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-6 text-right">
            <a href="{{ route('admin.products.create') }}"
               class="bg-rosewood text-white px-4 py-2 rounded hover:bg-dustyBlush transition">
                + Add Product
            </a>
        </div>

        <table class="min-w-full bg-white border border-rosewood rounded shadow">
            <thead class="bg-nadaPink text-rosewood">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2 text-left">Price</th>
                    <th class="px-4 py-2 text-left">Stock</th>
                    <th class="px-4 py-2 text-left">Created</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $product->id }}</td>
                        <td class="px-4 py-2">{{ $product->name }}</td>
                        <td class="px-4 py-2">RM {{ number_format($product->price, 2) }}</td>
                        <td class="px-4 py-2">{{ $product->stock }}</td>
                        <td class="px-4 py-2">{{ $product->created_at->format('d M Y') }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.products.edit', $product) }}"
                               class="text-blue-600 hover:underline">Edit</a>

                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>