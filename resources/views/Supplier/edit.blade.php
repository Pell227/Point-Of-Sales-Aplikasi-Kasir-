@extends('layouts.main')

@section('title','Edit Supplier')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="bg-white rounded-xl shadow p-8">

        <h1 class="text-3xl font-bold mb-6">
            Edit Supplier
        </h1>

        <form action="{{ route('suppliers.update',$supplier->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label class="block mb-2 font-semibold">
                    Nama Supplier
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ $supplier->name }}"
                    class="w-full border rounded-lg px-4 py-3">

            </div>

            <div class="mb-4">

                <label class="block mb-2 font-semibold">
                    Nomor Telepon
                </label>

                <input
                    type="text"
                    name="phone"
                    value="{{ $supplier->phone }}"
                    class="w-full border rounded-lg px-4 py-3">

            </div>

            <div class="mb-6">

                <label class="block mb-2 font-semibold">
                    Alamat
                </label>

                <textarea
                    name="address"
                    rows="4"
                    class="w-full border rounded-lg px-4 py-3">{{ $supplier->address }}</textarea>

            </div>

            <div class="flex gap-3">

                <a href="{{ route('suppliers.index') }}"
                   class="bg-gray-500 text-white px-5 py-3 rounded-lg">

                    Kembali

                </a>

                <button
                    type="submit"
                    class="bg-yellow-500 text-white px-5 py-3 rounded-lg">

                    Update Supplier

                </button>

            </div>

        </form>

    </div>

</div>

@endsection