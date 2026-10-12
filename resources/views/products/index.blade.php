@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')

    <div class="bg-white rounded-xl shadow-sm p-6">

        <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
            <div>
                <h1 class="text-2xl font-bold">
                    Daftar Produk
                </h1>

                <p class="text-slate-500 mt-1">
                    Kelola seluruh produk yang tersedia.
                </p>
            </div>

            <a href="{{ route('products.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                + Tambah Produk
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-5">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-5">
            <input type="text"
                   id="searchProduct"
                   placeholder="Cari nama produk..."
                   class="w-full md:w-80 border border-slate-300 rounded-lg p-3">
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">

                <thead class="bg-slate-100 text-slate-700">
                    <tr>
                        <th class="p-4">No</th>
                        <th class="p-4">Nama Produk</th>
                        <th class="p-4">Harga</th>
                        <th class="p-4">Stok</th>
                        <th class="p-4">Supplier</th>
                        <th class="p-4">Kategori</th>
                        <th class="p-4">Aksi</th>
                    </tr>
                </thead>

                <tbody id="productTable">
                    @forelse($products as $product)
                        <tr class="border-b border-slate-200 product-row">

                            <td class="p-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="p-4 product-name">
                                {{ $product->name }}
                            </td>

                            <td class="p-4">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </td>

                            <td class="p-4">
                                {{ $product->stock }}
                            </td>

                            <td class="p-4">
                                {{ $product->supplier->name ?? '-' }}
                            </td>

                            <td class="p-4">
                                {{ $product->category->name ?? '-' }}
                            </td>

                            <td class="p-4">
                                <div class="flex items-center gap-3">

                                    <a href="{{ route('products.edit', $product) }}"
                                       class="text-blue-600 hover:underline">
                                        Edit
                                    </a>

                                    <form action="{{ route('products.destroy', $product) }}"
                                          method="POST"
                                          class="delete-form">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="text-red-600 hover:underline cursor-pointer">
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7"
                                class="p-6 text-center text-slate-500">
                                Belum ada produk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

            <p id="noSearchResults"
               class="hidden text-center text-slate-500 p-5">
                Produk tidak ditemukan.
            </p>
        </div>

    </div>

@endsection