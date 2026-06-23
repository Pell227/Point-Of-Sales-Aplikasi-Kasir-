@extends('layouts.main')

@section('title', 'Detail Promo')

@section('content')

<div class="bg-white rounded-xl shadow p-6 max-w-4xl">

    <h1 class="text-2xl font-bold mb-6">
        Detail Promo
    </h1>

    <div class="grid grid-cols-2 gap-6">

        <div>
            <p class="text-gray-500">Nama Promo</p>
            <p class="font-semibold">{{ $promotion->promo_name }}</p>
        </div>

        <div>
            <p class="text-gray-500">Jenis Diskon</p>
            <p class="font-semibold">{{ $promotion->discount_type }}</p>
        </div>

        <div>
            <p class="text-gray-500">Nilai Diskon</p>
            <p class="font-semibold">
                {{ $promotion->discount_value }}
            </p>
        </div>

        <div>
            <p class="text-gray-500">Minimal Belanja</p>
            <p class="font-semibold">
                {{ $promotion->min_purchase }}
            </p>
        </div>

        <div>
            <p class="text-gray-500">Tanggal Mulai</p>
            <p class="font-semibold">
                {{ $promotion->start_date }}
            </p>
        </div>

        <div>
            <p class="text-gray-500">Tanggal Selesai</p>
            <p class="font-semibold">
                {{ $promotion->end_date }}
            </p>
        </div>

        <div>
            <p class="text-gray-500">Status</p>

            @if($promotion->is_active)

                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                    Aktif
                </span>

            @else

                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
                    Tidak Aktif
                </span>

            @endif

        </div>

    </div>

    <div class="mt-6">

        <a href="{{ route('promotions.index') }}"
           class="bg-gray-600 text-white px-4 py-2 rounded-lg">

            Kembali

        </a>

    </div>

</div>

@endsection