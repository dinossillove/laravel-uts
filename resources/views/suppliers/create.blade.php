@extends('layouts.app')

@section('title', 'Tambah Supplier')

@section('content')

    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-sm p-6">
        <h1 class="text-2xl font-bold mb-6">
            Tambah Supplier
        </h1>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-5">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('suppliers.store') }}" method="POST">
            @csrf
            @include('suppliers._form')
        </form>
    </div>

@endsection
