@extends('layouts.app')

@section('content')
<div style="background-color: #FFF5F7; min-height: 100vh; padding: 40px; font-family: 'Segoe UI', sans-serif;">

    <!-- Toast Notification -->
    @if (session('cart_added'))
        <div id="toast" style="position: fixed; top: 24px; right: 24px; background-color: #743b3b; color: white; padding: 12px 20px; border-radius: 6px; box-shadow: 0 2px 8px rgba(0,0,0,0.2); transition: opacity 0.5s ease;">
            Item added to cart.
        </div>
        <script>
            setTimeout(() => {
                const toast = document.getElementById('toast');
                if (toast) toast.style.opacity = '0';
            }, 3000);
        </script>
    @endif

    <div style="max-width: 1000px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center;">

        <!-- Product Image -->
        <div>
            @if($product->image && file_exists(public_path('images/' . $product->image)))
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                     style="width: 100%; max-height: 400px; object-fit: contain; border: 1px solid #743b3b; border-radius: 8px;">
            @else
                <div style="width: 100%; height: 300px; background-color: #e5e5e5; display: flex; align-items: center; justify-content: center; color: #888; border-radius: 8px;">
                    No Image Available
                </div>
            @endif
        </div>

        <!-- Product Details -->
        <div>
            <h1 style="font-size: 32px; font-weight: bold; color: #743b3b;">{{ $product->name }}</h1>
            <p style="font-size: 24px; color: #743b3b; margin-top: 10px;">RM{{ number_format($product->price, 2) }}</p>

            @if($product->description)
                <p style="color: #743b3b; font-style: italic; margin-top: 20px;">“{{ $product->description }}”</p>
            @endif

            @if ($product->stock > 0)
                <form method="POST" action="{{ route('cart.add', $product->id) }}" style="margin-top: 20px;">
                    @csrf

                    <!-- Quantity Selector -->
                    <label for="quantity" style="display: block; margin-bottom: 8px; color: #743b3b;">Quantity</label>
                    <select name="quantity" id="quantity"
                            style="width: 100%; max-width: 300px; padding: 10px; border: 1px solid #743b3b; border-radius: 4px; font-size: 16px;">
                        @for ($i = 1; $i <= min(10, $product->stock); $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>

                    <!-- Add to Cart Button -->
                    <button type="submit"
                            style="width: 100%; max-width: 300px; margin-top: 20px; padding: 10px; background-color: #743b3b; color: white; border: none; border-radius: 4px; font-size: 16px;">
                        Add to Cart
                    </button>
                </form>
            @else
                <div style="margin-top: 20px; padding: 10px; background-color: #ccc; color: #555; text-align: center; border-radius: 4px;">
                    Out of Stock
                </div>
            @endif
        </div>
    </div>
</div>
@endsection