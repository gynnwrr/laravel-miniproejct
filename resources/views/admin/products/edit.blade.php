@extends('layouts.app')

@section('content')
    <div class="py-8 px-6 max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-rosewood mb-6">Edit Product</h1>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm text-rosewood">Product Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                       class="w-full px-4 py-2 border border-rosewood rounded bg-white text-rosewood" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm text-rosewood">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full px-4 py-2 border border-rosewood rounded bg-white text-rosewood" required>{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm text-rosewood">Price (RM)</label>
                <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $product->price) }}"
                       class="w-full px-4 py-2 border border-rosewood rounded bg-white text-rosewood" required>
            </div>

            <div class="mb-6">
                <label for="stock" class="block text-sm text-rosewood">Stock Quantity</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}"
                       class="w-full px-4 py-2 border border-rosewood rounded bg-white text-rosewood" required>
            </div>

            <button type="submit"
                    class="w-full px-5 py-2 bg-rosewood text-white font-semibold rounded hover:bg-dustyBlush transition">
                Update Product
            </button>
        </form>
    </div>
@endsection