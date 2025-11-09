<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
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
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $filename = Str::random(20) . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $filename);
            $imagePath = 'images/' . $filename;
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);

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
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'price', 'stock']);

        if ($request->hasFile('image')) {
            $filename = Str::random(20) . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $filename);
            $data['image'] = 'images/' . $filename;
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // 🛠️ Admin: delete product
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Product deleted successfully.');
    }

    // 🧾 Product detail page
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // 🧑‍💻 User dashboard
    public function dashboard()
    {
        if (auth()->user()->is_admin) {
            return redirect()->route('admin.products.index');
        }

        $products = Product::latest()->get();
        return view('dashboard', compact('products'));
    }
}