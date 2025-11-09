@extends('layouts.app')

@section('content')
<div style="background-color: #FFF5F7; min-height: 100vh; padding: 40px; font-family: 'Segoe UI', sans-serif;">

    <!-- Toast Notification -->
    @if (session('quantity_updated'))
        <div id="toast" style="position: fixed; top: 24px; right: 24px; background-color: #743b3b; color: white; padding: 12px 20px; border-radius: 6px; box-shadow: 0 2px 8px rgba(0,0,0,0.2); transition: opacity 0.5s ease;">
            Quantity updated successfully.
        </div>
        <script>
            setTimeout(() => {
                const toast = document.getElementById('toast');
                if (toast) toast.style.opacity = '0';
            }, 3000);
        </script>
    @endif

    <div style="max-width: 600px; margin: 0 auto;">
        <h1 style="font-size: 28px; font-weight: bold; color: #743b3b; text-align: center; margin-bottom: 32px;">
            Your Cart
        </h1>

        @if (count($cart) > 0)
            <ul style="display: flex; flex-direction: column; gap: 24px;">
                @foreach ($cart as $item)
                    <li style="background: white; padding: 24px; border-radius: 8px; border: 1px solid #743b3b; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
                        <h2 style="font-size: 18px; font-weight: 600; color: #743b3b;">{{ $item['name'] }}</h2>
                        <p style="color: #743b3b; margin-bottom: 16px;">RM{{ number_format($item['price'], 2) }}</p>

                        <!-- Quantity Update -->
                        <form method="POST" action="{{ route('cart.update', $item['id']) }}" style="display: flex; align-items: center; gap: 12px;">
                            @csrf
                            @method('PATCH')
                            <label for="quantity_{{ $item['id'] }}" style="font-size: 14px; color: #743b3b;">Qty:</label>
                            <input type="number" name="quantity" id="quantity_{{ $item['id'] }}"
                                   value="{{ $item['quantity'] }}" min="1"
                                   style="width: 100px; padding: 8px; border: 1px solid #743b3b; border-radius: 4px; color: #743b3b;">
                            <button type="submit"
                                    style="width: 100px; padding: 8px; background-color: #743b3b; color: white; border: none; border-radius: 4px;">
                                Update
                            </button>
                        </form>

                        <!-- Remove Item -->
                        <form method="POST" action="{{ route('cart.remove', $item['id']) }}" style="margin-top: 16px; text-align: right;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="font-size: 14px; color: #D88C9A; background: none; border: none; cursor: pointer;">
                                Remove
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>

            <!-- Clear Cart -->
            <form method="POST" action="{{ route('cart.clear') }}" style="margin-top: 40px; text-align: center;">
                @csrf
                <button type="submit"
                        style="padding: 12px 24px; background-color: #F3D1D8; color: #743b3b; font-weight: 600; border: none; border-radius: 6px; transition: background-color 0.3s ease;"
                        onmouseover="this.style.backgroundColor='#E8BFC8'"
                        onmouseout="this.style.backgroundColor='#F3D1D8'">
                    Clear Cart
                </button>
            </form>

            <!-- Checkout Button -->
            <div style="text-align: center; margin-top: 20px;">
                <a href="{{ route('checkout') }}"
                style="display: inline-block; padding: 14px 28px; background-color: #743b3b; color: #FFF5F7; font-weight: 700; border-radius: 6px; text-decoration: none; box-shadow: 0 2px 6px rgba(0,0,0,0.1); transition: background-color 0.3s ease;">
                    Proceed to Checkout
                </a>
            </div>

        @else
            <p style="text-align: center; color: #743b3b; font-style: italic; margin-top: 20px;">
                Your cart is empty — but your cravings are not.
            </p>
        @endif
    </div>
</div>
@endsection