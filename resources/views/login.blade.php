@extends('layouts.guest')

@section('title', 'Login')

@section('content')

    <h2 class="text-2xl font-bold mb-2">Login</h2>

    <p class="text-slate-500 mb-6">
        Masuk menggunakan akun Anda.
    </p>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-2 font-medium">Email</label>

            <input type="email" name="email"
                   value="{{ old('email') }}"
                   required
                   class="w-full border border-slate-300 rounded-lg p-3">
        </div>

        <div class="mb-6">
            <label class="block mb-2 font-medium">Password</label>

            <div class="relative">
                <input type="password" name="password"
                       id="password" required
                       class="w-full border border-slate-300 rounded-lg p-3 pr-24">

                <button type="button"
                        id="togglePassword"
                        class="absolute right-3 top-3 text-blue-600 text-sm cursor-pointer">
                    Lihat
                </button>
            </div>
        </div>

        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-lg cursor-pointer">
            Login
        </button>
    </form>

    <p class="text-center text-sm mt-6">
        Belum punya akun?

        <a href="{{ route('register') }}"
           class="text-blue-600 font-medium">
            Register
        </a>
    </p>

@endsection