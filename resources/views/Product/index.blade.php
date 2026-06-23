@extends('layouts.main')

@section('title', 'Product')

@section('content')

<div class="flex justify-between items-center mb-6">

    <div>
        <h1 class="text-3xl font-bold">
            Product Management
        </h1>

        <p class="text-gray-500">
            Kelola seluruh produk yang tersedia
        </p>
    </div>

    <a href="{{ route('products.create') }}"
       class="bg-green-600 text-white px-5 py-3 rounded-lg shadow">

        + Tambah Produk

    </a>

</div>

@if(session('success'))

<div class="bg-green-100 text-green-700 p-3 rounded mb-5">
    {{ session('success') }}
</div>

@endif

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

    @foreach($products as $product)

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <img
            src="{{ asset('Assets/Products/' . ($product->image ?? 'Kosong.jpg')) }}"
            class="h-48 w-full object-contain bg-white p-3">

        <div class="p-4">

            <h3 class="font-bold text-lg">
                {{ $product->name }}
            </h3>

            <p class="text-gray-500 text-sm">
                Supplier :
                {{ $product->supplier->name ?? '-' }}
            </p>

            <p class="text-green-600 font-bold text-xl mt-2">
                Rp {{ number_format($product->price) }}
            </p>

            <p class="text-gray-500">
                Stock : {{ $product->stock }}
            </p>

            <div class="flex gap-2 mt-4">

                <a href="{{ route('products.show',$product->id) }}"
                   class="flex-1 bg-blue-500 text-white text-center py-2 rounded">

                    Detail

                </a>

                <a href="{{ route('products.edit',$product->id) }}"
                   class="flex-1 bg-yellow-500 text-white text-center py-2 rounded">

                    Edit

                </a>

            </div>

            <form action="{{ route('products.destroy',$product->id) }}"
                  method="POST"
                  class="mt-2">

                @csrf
                @method('DELETE')

                <button
                    onclick="return confirm('Hapus produk ini?')"
                    class="w-full bg-red-500 text-white py-2 rounded">

                    Hapus

                </button>

            </form>

        </div>

    </div>

    @endforeach

</div>

@endsection