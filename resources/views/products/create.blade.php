@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')

    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-sm p-6">

        <h1 class="text-2xl font-bold mb-6">
            Tambah Produk
        </h1>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-5">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-2 font-medium">
                    Nama Produk
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
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
                       value="{{ old('price') }}"
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
                       value="{{ old('stock') }}"
                       required
                       class="w-full border border-slate-300 rounded-lg p-3">
            </div>

            <div class="mb-6">
                <label class="block mb-2 font-medium">
                    Deskripsi
                </label>

                <textarea name="description"
                          rows="4"
                          class="w-full border border-slate-300 rounded-lg p-3">{{ old('description') }}</textarea>
            </div>

            <div class="flex gap-3">

                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg cursor-pointer">
                    Simpan Produk
                </button>

                <a href="{{ route('products.index') }}"
                   class="bg-slate-200 hover:bg-slate-300 px-5 py-3 rounded-lg">
                    Batal
                </a>

            </div>
        </form>

    </div>

@endsection