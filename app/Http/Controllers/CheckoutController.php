<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $cart = session('cart', []);

        foreach ($cart as $item) {
            $product = Product::find($item['id']);

            if ($product && $product->stock >= $item['quantity']) {
                $product->stock -= $item['quantity'];
                $product->save();
            }
        }

        session()->forget('cart');

        return redirect()->route('order.received');
    }
}