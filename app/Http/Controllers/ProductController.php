<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan seluruh produk
    public function index()
    {
        $products = Product::with(['supplier', 'category'])->latest()->get();

        return view('products.index', compact('products'));
    }

    // Menampilkan form tambah produk
    public function create()
    {
        $suppliers = Supplier::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('products.create', compact('suppliers', 'categories'));
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        Product::create($data);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit(Product $product)
    {
        $suppliers = Supplier::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('products.edit', compact('product', 'suppliers', 'categories'));
    }

    // Memperbarui produk
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $product->update($data);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    // Menghapus produk
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}