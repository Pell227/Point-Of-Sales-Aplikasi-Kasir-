@extends('layouts.main')

@section('title','Edit Product')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-xl shadow p-8">

        <h1 class="text-3xl font-bold mb-6">
            Edit Product
        </h1>

        <form action="{{ route('products.update',$product->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label class="block mb-2 font-semibold">
                    Nama Product
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ $product->name }}"
                    class="w-full border rounded-lg px-4 py-3">

            </div>

            <div class="grid grid-cols-2 gap-4">

                <div>

                    <label class="block mb-2 font-semibold">
                        Stock
                    </label>

                    <input
                        type="number"
                        name="stock"
                        value="{{ $product->stock }}"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Harga
                    </label>

                    <input
                        type="number"
                        name="price"
                        value="{{ $product->price }}"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

            </div>

            <div class="mt-4">

                <label class="block mb-2 font-semibold">
                    Supplier
                </label>

                <select
                    name="supplier_id"
                    class="w-full border rounded-lg px-4 py-3">

                    <option value="">
                        -- Pilih Supplier --
                    </option>

                    @foreach($suppliers as $supplier)

                        <option
                            value="{{ $supplier->id }}"
                            {{ $product->supplier_id == $supplier->id ? 'selected' : '' }}>

                            {{ $supplier->name }}

                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-semibold">Kategori</label>
                <select name="category_id" class="w-full border rounded-lg px-4 py-3">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}"
                            {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->nameK }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label class="block mb-2 font-semibold">Gambar Produk</label>
                @if($product->image)
                    <img src="{{ asset('Assets/Products/' . $product->image) }}"
                         class="h-24 w-24 object-cover rounded-lg mb-2 border">
                @endif
                <input type="file" name="image" accept="image/*"
                       class="w-full border rounded-lg px-4 py-3">
                <p class="text-xs text-gray-400 mt-1">Kosongkan jika tidak ingin mengganti gambar</p>
            </div>

            <div class="flex gap-3 mt-8">

                <a href="{{ route('products.index') }}"
                   class="bg-gray-500 text-white px-5 py-3 rounded-lg">

                    Kembali

                </a>

                <button
                    type="submit"
                    class="bg-yellow-500 text-white px-5 py-3 rounded-lg">

                    Update Product

                </button>

            </div>

        </form>

    </div>

</div>

@endsection