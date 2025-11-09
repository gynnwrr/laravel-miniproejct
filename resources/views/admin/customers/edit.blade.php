@extends('layouts.app')

@section('content')
<div class="py-8 px-6 max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold text-rosewood mb-6">Edit Customer</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm text-rosewood">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $customer->name) }}"
                   class="w-full px-4 py-2 border border-rosewood rounded bg-white text-rosewood" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm text-rosewood">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $customer->email) }}"
                   class="w-full px-4 py-2 border border-rosewood rounded bg-white text-rosewood" required>
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-sm text-rosewood">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $customer->phone) }}"
                   class="w-full px-4 py-2 border border-rosewood rounded bg-white text-rosewood">
        </div>

        <div class="mb-6">
            <label for="address" class="block text-sm text-rosewood">Address</label>
            <textarea name="address" id="address" rows="3"
                      class="w-full px-4 py-2 border border-rosewood rounded bg-white text-rosewood">{{ old('address', $customer->address) }}</textarea>
        </div>

        <button type="submit"
                class="w-full px-5 py-2 bg-rosewood text-white font-semibold rounded hover:bg-dustyBlush transition">
            Update Customer
        </button>
    </form>
</div>
@endsection