@extends('layouts.main')

@section('title','Tambah Product')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-xl shadow p-8">

        <h1 class="text-3xl font-bold mb-6">
            Tambah Product
        </h1>

        <form action="{{ route('products.store') }}"
              method="POST">

            @csrf

            <div class="mb-4">

                <label class="block mb-2 font-semibold">
                    Nama Product
                </label>

                <input
                    type="text"
                    name="name"
                    class="w-full border rounded-lg px-4 py-3"
                    placeholder="Contoh : Big Mac">

            </div>

            <div class="grid grid-cols-2 gap-4">

                <div>

                    <label class="block mb-2 font-semibold">
                        Stock
                    </label>

                    <input
                        type="number"
                        name="stock"
                        class="w-full border rounded-lg px-4 py-3"
                        placeholder="0">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Harga
                    </label>

                    <input
                        type="number"
                        name="price"
                        class="w-full border rounded-lg px-4 py-3"
                        placeholder="48000">

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

                        <option value="{{ $supplier->id }}">
                            {{ $supplier->name }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="flex gap-3 mt-8">

                <a href="{{ route('products.index') }}"
                   class="bg-gray-500 text-white px-5 py-3 rounded-lg">

                    Kembali

                </a>

                <button
                    type="submit"
                    class="bg-green-600 text-white px-5 py-3 rounded-lg">

                    Simpan Product

                </button>

            </div>

        </form>

    </div>

</div>

@endsection