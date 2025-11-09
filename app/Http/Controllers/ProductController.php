<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // 🛍️ Public product listing
    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index', compact('products'));
    }

    // 🛠️ Admin: create product form
    public function create()
    {
        return view('products.create');
    }

    // 🛠️ Admin: store new product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // 🛠️ Admin: edit product form
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // 🛠️ Admin: update product
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // 🛠️ Admin: delete product
    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('success', 'Product deleted successfully.');
    }

    public function dashboard()
{
    if (auth()->user()->is_admin) {
        return redirect()->route('admin.products.index');
    }

    $products = \App\Models\Product::latest()->take(8)->get();
    return view('dashboard', compact('products'));
}

}

