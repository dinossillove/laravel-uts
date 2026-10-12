@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')

    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
            <div>
                <h1 class="text-2xl font-bold">Daftar Kategori</h1>
                <p class="text-slate-500 mt-1">Kelola seluruh kategori produk.</p>
            </div>
            <a href="{{ route('categories.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                + Tambah Kategori
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-5">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('categories.index') }}" method="GET" class="flex flex-wrap gap-3 mb-5">
            <input type="search"
                   name="q"
                   value="{{ request('q') }}"
                   placeholder="Cari nama kategori..."
                   class="w-full md:w-80 border border-slate-300 rounded-lg p-3">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg cursor-pointer">
                Cari
            </button>
            @if(request('q'))
                <a href="{{ route('categories.index') }}"
                   class="bg-slate-200 hover:bg-slate-300 px-5 py-3 rounded-lg">
                    Reset
                </a>
            @endif
        </form>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-100 text-slate-700">
                    <tr>
                        <th class="p-4">No</th>
                        <th class="p-4">Nama</th>
                        <th class="p-4">Deskripsi</th>
                        <th class="p-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr class="border-b border-slate-200">
                            <td class="p-4">{{ $categories->firstItem() + $loop->index }}</td>
                            <td class="p-4">{{ $category->name }}</td>
                            <td class="p-4">{{ $category->description ?? '-' }}</td>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('categories.show', $category) }}"
                                       class="text-blue-600 hover:underline">
                                        Detail
                                    </a>
                                    <a href="{{ route('categories.edit', $category) }}"
                                       class="text-blue-600 hover:underline">
                                        Edit
                                    </a>
                                    <form action="{{ route('categories.destroy', $category) }}"
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
                            <td colspan="4" class="p-6 text-center text-slate-500">
                                Kategori tidak ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            {{ $categories->links() }}
        </div>
    </div>

@endsection
