@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')

    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-sm p-6">
        <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
            <h1 class="text-2xl font-bold">Detail Kategori</h1>
            <a href="{{ route('categories.edit', $category) }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Edit
            </a>
        </div>

        <div class="space-y-4">
            <div>
                <p class="text-slate-500">Nama</p>
                <p class="font-medium">{{ $category->name }}</p>
            </div>
            <div>
                <p class="text-slate-500">Deskripsi</p>
                <p class="font-medium">{{ $category->description ?? '-' }}</p>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('categories.index') }}"
               class="bg-slate-200 hover:bg-slate-300 px-5 py-3 rounded-lg">
                Kembali
            </a>
        </div>
    </div>

@endsection
