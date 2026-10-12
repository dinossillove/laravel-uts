@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="bg-white rounded-xl shadow-sm p-8">

        <h1 class="text-2xl font-bold mb-3">
            Selamat Datang, {{ auth()->user()->name }}
        </h1>

        <p class="text-slate-500 mb-6">
            Anda berhasil login ke sistem manajemen produk.
        </p>

        <a href="{{ route('products.index') }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg">
            Kelola Produk
        </a>

    </div>

@endsection