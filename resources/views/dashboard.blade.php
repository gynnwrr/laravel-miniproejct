@extends('layouts.app')

@section('content')
<div style="background-color: #FFF5F7; min-height: 100vh; padding: 40px; font-family: 'Segoe UI', sans-serif;">

    <!-- Header -->
    <div style="text-align: center; margin-bottom: 40px;">
        <h1 style="font-size: 32px; font-weight: bold; color: #743b3b;">NEW ARRIVALS</h1>
        <p style="color: #743b3b; margin-top: 10px;">Explore our latest collection, RAPUH</p>
    </div>

    <!-- Product Grid -->
    @if($products->count())
        <div style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 30px;">
            @foreach($products as $product)
                <div style="background-color: white; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); overflow: hidden;">
                    @if($product->image && file_exists(public_path('images/' . $product->image)))
                        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 250px; object-fit: cover;">
                    @else
                        <div style="width: 100%; height: 250px; background-color: #e5e5e5; display: flex; align-items: center; justify-content: center; color: #888;">
                            No Image
                        </div>
                    @endif
                    <div style="padding: 20px;">
                        <h2 style="font-size: 18px; font-weight: 600; color: #743b3b;">{{ $product->name }}</h2>
                        <p style="color: #743b3b; margin-top: 5px;">RM{{ number_format($product->price, 2) }}</p>
                        <a href="{{ route('products.show', $product->id) }}" style="display: inline-block; margin-top: 15px; padding: 10px 20px; background-color: #743b3b; color: white; border-radius: 4px; text-decoration: none;">
                            View More
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div style="text-align: center; color: #743b3b; margin-top: 60px;">
            <p style="font-size: 18px; font-weight: 600;">No products available at the moment.</p>
            <p style="font-size: 14px; margin-top: 10px;">Please check back later or explore other categories.</p>
        </div>
    @endif

</div>
@endsection