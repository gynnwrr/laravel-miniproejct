<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer', 'products')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('orders.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $order = Order::create([
            'customer_id' => $request->customer_id,
            'total_price' => 0, // will be updated below
        ]);

        $total = 0;

        foreach ($request->products as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product && $quantity > 0) {
                $order->products()->attach($productId, ['quantity' => $quantity]);
                $total += $product->price * $quantity;
            }
        }

        $order->update(['total_price' => $total]);

        return redirect()->route('orders.index');
    }

    public function show(Order $order)
    {
        $order->load('customer', 'products');
        return view('orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return back();
    }
}