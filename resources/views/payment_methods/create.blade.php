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
                    id="payment_method"
                    class="w-full border rounded-lg p-2">


                <option value="">-- Pilih Metode --</option>
                <option value="Tunai">Tunai</option>
                <option value="Non Tunai">Non Tunai</option>

            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-2">
                Jenis Pembayaran
            </label>

            <select name="payment_type"
                    id="payment_type"
                    class="w-full border rounded-lg p-2">


                <option value="">-- Pilih --</option>
                <option value="Cash">Cash</option>
                <option value="QRIS">QRIS</option>
                <option value="Transfer">Transfer</option>

            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-2">
                Tipe
            </label>

            <select name="payment_category"
                    id="payment_category"
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
                   id="provider"
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
<script>
        document.addEventListener('DOMContentLoaded', function () {

            const method = document.getElementById('payment_method');
            const type = document.getElementById('payment_type');
            const category = document.getElementById('payment_category');
            const provider = document.getElementById('provider');

            function toggleFields() {

                if (method.value === 'Tunai') {

                    type.disabled = true;
                    category.disabled = true;
                    provider.disabled = true;
                    
                    type.value = 'Cash';
                    category.value = '';
                    provider.value = 'Kasir';

                    type.classList.add('bg-gray-200');
                    category.classList.add('bg-gray-200');
                    provider.classList.add('bg-gray-200');

                    type.classList.remove('bg-gray-200');
                    category.classList.remove('bg-gray-200');
                    provider.classList.remove('bg-gray-200');

                } 
                else {

                    type.disabled = false;
                    category.disabled = false;
                    provider.disabled = false;

                }
            }

            toggleFields();

            method.addEventListener('change', toggleFields);
        });
</script>

@endsection