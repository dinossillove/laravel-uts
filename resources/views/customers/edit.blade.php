@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')

    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-sm p-6">

        <h1 class="text-2xl font-bold mb-6">
            Edit Customer
        </h1>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-5">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('customers.update', $customer) }}"
              method="POST">
            @csrf
            @method('PUT')

            @include('customers._form')
        </form>

    </div>

@endsection
