@extends('layouts.main')

@section('title','Tambah Supplier')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="bg-white rounded-xl shadow p-8">

        <h1 class="text-3xl font-bold mb-6">
            Tambah Supplier
        </h1>

        <form action="{{ route('suppliers.store') }}"
              method="POST">

            @csrf

            <div class="mb-4">

                <label class="block mb-2 font-semibold">
                    Nama Supplier
                </label>

                <input
                    type="text"
                    name="name"
                    class="w-full border rounded-lg px-4 py-3"
                    placeholder="Masukkan nama supplier">

            </div>

            <div class="mb-4">

                <label class="block mb-2 font-semibold">
                    Nomor Telepon
                </label>

                <input
                    type="text"
                    name="phone"
                    class="w-full border rounded-lg px-4 py-3"
                    placeholder="08xxxxxxxxxx">

            </div>

            <div class="mb-6">

                <label class="block mb-2 font-semibold">
                    Alamat
                </label>

                <textarea
                    name="address"
                    rows="4"
                    class="w-full border rounded-lg px-4 py-3"
                    placeholder="Masukkan alamat supplier"></textarea>

            </div>

            <div class="flex gap-3">

                <a href="{{ route('suppliers.index') }}"
                   class="bg-gray-500 text-white px-5 py-3 rounded-lg">

                    Kembali

                </a>

                <button
                    type="submit"
                    class="bg-green-600 text-white px-5 py-3 rounded-lg">

                    Simpan Supplier

                </button>

            </div>

        </form>

    </div>

</div>

@endsection