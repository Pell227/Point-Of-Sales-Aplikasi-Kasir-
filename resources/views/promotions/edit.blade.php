@extends('layouts.main')

@section('title', 'Edit Promo')

@section('content')

<div class="bg-white rounded-xl shadow p-6 max-w-3xl">

    <h1 class="text-2xl font-bold mb-6">
        Edit Promo
    </h1>

    <form action="{{ route('promotions.update', $promotion->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-4">

            <label class="block mb-2">
                Nama Promo
            </label>

            <input type="text"
                   name="promo_name"
                   value="{{ $promotion->promo_name }}"
                   class="w-full border rounded-lg p-2">

        </div>

        <div class="mb-4">

            <label class="block mb-2">
                Jenis Diskon
            </label>

            <select name="discount_type"
                    class="w-full border rounded-lg p-2">

                <option value="percentage"
                    {{ $promotion->discount_type == 'percentage' ? 'selected' : '' }}>
                    Persentase
                </option>

                <option value="fixed"
                    {{ $promotion->discount_type == 'fixed' ? 'selected' : '' }}>
                    Nominal
                </option>

            </select>

        </div>

        <div class="mb-4">

            <label class="block mb-2">
                Nilai Diskon
            </label>

            <input type="number"
                   name="discount_value"
                   value="{{ $promotion->discount_value }}"
                   class="w-full border rounded-lg p-2">

        </div>

        <div class="mb-4">

            <label class="block mb-2">
                Minimal Belanja
            </label>

            <input type="number"
                    name="min_purchase"
                    value="{{ $promotion->min_purchase }}"
                    class="w-full border rounded-lg p-2">

        </div>

        <div class="grid grid-cols-2 gap-4">

            <div>

                <label class="block mb-2">
                    Tanggal Mulai
                </label>

                <input type="date"
                       name="start_date"
                       value="{{ $promotion->start_date }}"
                       class="w-full border rounded-lg p-2">

            </div>

            <div>

                <label class="block mb-2">
                    Tanggal Selesai
                </label>

                <input type="date"
                       name="end_date"
                       value="{{ $promotion->end_date }}"
                       class="w-full border rounded-lg p-2">

            </div>

        </div>

        <div class="mt-4 mb-6">

            <label class="block mb-2">
                Status
            </label>

            <select name="is_active"
                    class="w-full border rounded-lg p-2">

                <option value="1"
                    {{ $promotion->is_active ? 'selected' : '' }}>
                    Aktif
                </option>

                <option value="0"
                    {{ !$promotion->is_active ? 'selected' : '' }}>
                    Tidak Aktif
                </option>

            </select>

        </div>

        <div class="flex gap-3">

            <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">

                Update Promo

            </button>

            <a href="{{ route('promotions.index') }}"
               class="bg-gray-500 text-white px-5 py-2 rounded-lg hover:bg-gray-600">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection