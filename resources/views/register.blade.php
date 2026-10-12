@extends('layouts.guest')

@section('title', 'Register')

@section('content')

    <h2 class="text-2xl font-bold mb-2">Buat Akun</h2>

    <p class="text-slate-500 mb-6">
        Silakan isi data untuk mendaftar.
    </p>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-2 font-medium">
                Nama Lengkap
            </label>

            <input type="text" name="name"
                   value="{{ old('name') }}"
                   required
                   class="w-full border border-slate-300 rounded-lg p-3">
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">Email</label>

            <input type="email" name="email"
                   value="{{ old('email') }}"
                   required
                   class="w-full border border-slate-300 rounded-lg p-3">
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">Password</label>

            <input type="password" name="password"
                   minlength="8" required
                   class="w-full border border-slate-300 rounded-lg p-3">
        </div>

        <div class="mb-6">
            <label class="block mb-2 font-medium">
                Konfirmasi Password
            </label>

            <input type="password"
                   name="password_confirmation"
                   minlength="8" required
                   class="w-full border border-slate-300 rounded-lg p-3">
        </div>

        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-lg cursor-pointer">
            Register
        </button>
    </form>

    <p class="text-center text-sm mt-6">
        Sudah punya akun?
                <a href="{{ route('login') }}"
           class="text-blue-600 font-medium">
            Login
        </a>
    </p>

@endsection