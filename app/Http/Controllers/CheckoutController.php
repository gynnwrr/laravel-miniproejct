<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        return view('cart.checkout', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'shipping_address' => 'required|string|max:500',
            'notes' => 'nullable|string|max:500',
        ]);

        $cart = session('cart', []);

        foreach ($cart as $item) {
            $product = Product::find($item['id']);

            if ($product && $product->stock >= $item['quantity']) {
                $product->stock -= $item['quantity'];
                $product->save();
            }
        }

        // You can store order details here if needed

        session()->forget('cart');

        return redirect()->route('order.received')->with('success', 'Order placed successfully!');
    }
}