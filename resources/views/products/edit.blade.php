@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')

    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-sm p-6">

        <h1 class="text-2xl font-bold mb-6">
            Edit Produk
        </h1>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-5">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('products.update', $product) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-2 font-medium">
                    Nama Produk
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name', $product->name) }}"
                       required
                       class="w-full border border-slate-300 rounded-lg p-3">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-medium">
                    Harga
                </label>

                <input type="number"
                       name="price"
                       min="0"
                       value="{{ old('price', $product->price) }}"
                       required
                       class="w-full border border-slate-300 rounded-lg p-3">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-medium">
                    Stok
                </label>

                <input type="number"
                       name="stock"
                       min="0"
                       value="{{ old('stock', $product->stock) }}"
                       required
                       class="w-full border border-slate-300 rounded-lg p-3">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-medium">
                    Supplier (opsional)
                </label>

                <select name="supplier_id"
                        class="w-full border border-slate-300 rounded-lg p-3">
                    <option value="">Pilih supplier</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}"
                                @selected(old('supplier_id', $product->supplier_id) == $supplier->id)>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-medium">
                    Kategori (opsional)
                </label>

                <select name="category_id"
                        class="w-full border border-slate-300 rounded-lg p-3">
                    <option value="">Pilih kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                @selected(old('category_id', $product->category_id) == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label class="block mb-2 font-medium">
                    Deskripsi
                </label>

                <textarea name="description"
                          rows="4"
                          class="w-full border border-slate-300 rounded-lg p-3">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="flex gap-3">

                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg cursor-pointer">
                    Update Produk
                </button>

                <a href="{{ route('products.index') }}"
                   class="bg-slate-200 hover:bg-slate-300 px-5 py-3 rounded-lg">
                    Batal
                </a>

            </div>
        </form>

    </div>

@endsection