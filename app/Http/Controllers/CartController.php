<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Add product to cart
    public function add(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);
        $found = false;

        foreach ($cart as &$item) {
            if ($item['id'] === $product->id) {
                $item['quantity'] += (int) $request->input('quantity', 1);
                $found = true;
                break;
            }
        }

        if (! $found) {
            $cart[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => (int) $request->input('quantity', 1),
            ];
        }

        session()->put('cart', $cart);
        session()->flash('cart_added', true);

        return redirect()->back();
    }

    // Show cart contents
    public function show()
    {
        $cart = session('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Clear entire cart
    public function clear()
    {
        session()->forget('cart');
        return back();
    }

    // Update quantity of a specific item
    public function update(Request $request, $productId)
    {
        $cart = session()->get('cart', []);

        foreach ($cart as &$item) {
            if ($item['id'] == $productId) {
                $item['quantity'] = max(1, (int) $request->input('quantity'));
                break;
            }
        }

        session()->put('cart', $cart);
        session()->flash('quantity_updated', true);

        return redirect()->route('cart.show');
    }

    // Remove item from cart
    public function remove($productId)
    {
        $cart = session()->get('cart', []);

        $cart = array_filter($cart, fn($item) => $item['id'] != $productId);
        session()->put('cart', array_values($cart)); // reindex

        return redirect()->route('cart.show');
    }
}