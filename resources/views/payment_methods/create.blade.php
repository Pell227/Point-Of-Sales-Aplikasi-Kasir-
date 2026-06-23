@extends('layouts.main')

@section('title', 'Tambah Metode Pembayaran')

@section('content')

<div class="bg-white rounded-xl shadow p-6 max-w-3xl">

    <h1 class="text-2xl font-bold mb-6">
        Tambah Metode Pembayaran
    </h1>

    <form action="{{ route('paymentMethods.store') }}" method="POST">

        @csrf

        <div class="mb-4">
            <label class="block mb-2">
                Metode Pembayaran
            </label>

            <select name="payment_method"
                    class="w-full border rounded-lg p-2">

                <option value="Tunai">Tunai</option>
                <option value="Non Tunai">Non Tunai</option>

            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-2">
                Jenis Pembayaran
            </label>

            <select name="payment_type"
                    class="w-full border rounded-lg p-2">

                <option value="">-- Pilih --</option>
                <option value="QRIS">QRIS</option>
                <option value="Transfer">Transfer</option>

            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-2">
                Tipe
            </label>

            <select name="payment_category"
                    class="w-full border rounded-lg p-2">

                <option value="">-- Pilih --</option>
                <option value="E-Wallet">E-Wallet</option>
                <option value="Mobile Banking">Mobile Banking</option>

            </select>
        </div>

        <div class="mb-6">
            <label class="block mb-2">
                Provider
            </label>

            <input type="text"
                   name="provider"
                   class="w-full border rounded-lg p-2"
                   placeholder="Contoh: Gopay, Dana, BCA Mobile">
        </div>

        <div class="flex gap-3">

            <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">

                Simpan

            </button>

            <a href="{{ route('paymentMethods.index') }}"
               class="bg-gray-500 text-white px-5 py-2 rounded-lg hover:bg-gray-600">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection