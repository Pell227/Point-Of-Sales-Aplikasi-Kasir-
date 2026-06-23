@extends('layouts.main')

@section('title', 'Edit Metode Pembayaran')

@section('content')

<div class="bg-white rounded-xl shadow p-6 max-w-3xl">

    <h1 class="text-2xl font-bold mb-6">
        Edit Metode Pembayaran
    </h1>

    <form action="{{ route('paymentMethods.update', $paymentMethod->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-4">

            <label class="block mb-2">
                Metode Pembayaran
            </label>

            <select name="payment_method"
                    class="w-full border rounded-lg p-2">

                <option value="Tunai"
                    {{ $paymentMethod->payment_method == 'Tunai' ? 'selected' : '' }}>
                    Tunai
                </option>

                <option value="Non Tunai"
                    {{ $paymentMethod->payment_method == 'Non Tunai' ? 'selected' : '' }}>
                    Non Tunai
                </option>

            </select>

        </div>

        <div class="mb-4">

            <label class="block mb-2">
                Jenis Pembayaran
            </label>

            <select name="payment_type"
                    class="w-full border rounded-lg p-2">

                <option value="QRIS"
                    {{ $paymentMethod->payment_type == 'QRIS' ? 'selected' : '' }}>
                    QRIS
                </option>

                <option value="Transfer"
                    {{ $paymentMethod->payment_type == 'Transfer' ? 'selected' : '' }}>
                    Transfer
                </option>

            </select>

        </div>

        <div class="mb-4">

            <label class="block mb-2">
                Tipe
            </label>

            <select name="payment_category"
                    class="w-full border rounded-lg p-2">

                <option value="E-Wallet"
                    {{ $paymentMethod->payment_category == 'E-Wallet' ? 'selected' : '' }}>
                    E-Wallet
                </option>

                <option value="Mobile Banking"
                    {{ $paymentMethod->payment_category == 'Mobile Banking' ? 'selected' : '' }}>
                    Mobile Banking
                </option>

            </select>

        </div>

        <div class="mb-6">

            <label class="block mb-2">
                Provider
            </label>

            <input type="text"
                   name="provider"
                   value="{{ $paymentMethod->provider }}"
                   class="w-full border rounded-lg p-2">

        </div>

        <div class="flex gap-3">

            <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">

                Update

            </button>

            <a href="{{ route('paymentMethods.index') }}"
               class="bg-gray-500 text-white px-5 py-2 rounded-lg hover:bg-gray-600">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection