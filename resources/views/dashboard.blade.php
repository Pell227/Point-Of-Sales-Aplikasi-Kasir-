@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">

    <div class="bg-white rounded-xl shadow p-5 flex items-center gap-4">
        <div class="bg-blue-100 text-blue-600 rounded-full p-3">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0H4"/>
            </svg>
        </div>
        <div>
            <p class="text-sm text-gray-500">Total Produk</p>
            <p class="text-2xl font-bold text-gray-800">{{ $totalProduk }}</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-5 flex items-center gap-4">
        <div class="bg-purple-100 text-purple-600 rounded-full p-3">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-4a4 4 0 100-8 4 4 0 000 8z"/>
            </svg>
        </div>
        <div>
            <p class="text-sm text-gray-500">Total Staff</p>
            <p class="text-2xl font-bold text-gray-800">{{ $totalStaff }}</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-5 flex items-center gap-4">
        <div class="bg-yellow-100 text-yellow-600 rounded-full p-3">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8 17l4 4 4-4m0-5l-4-4-4 4M12 3v13"/>
            </svg>
        </div>
        <div>
            <p class="text-sm text-gray-500">Total Supplier</p>
            <p class="text-2xl font-bold text-gray-800">{{ $totalSupplier }}</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-5 flex items-center gap-4">
        <div class="bg-green-100 text-green-600 rounded-full p-3">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6"/>
            </svg>
        </div>
        <div>
            <p class="text-sm text-gray-500">Transaksi Hari Ini</p>
            <p class="text-2xl font-bold text-gray-800">{{ $transaksiHariIni }}</p>
        </div>
    </div>

</div>

<div class="grid grid-cols-1 xl:grid-cols-3 gap-5">

    <div class="bg-white rounded-xl shadow p-6 flex flex-col justify-center items-center text-center">
        <div class="bg-green-100 text-green-600 rounded-full p-4 mb-3">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <p class="text-sm text-gray-500 mb-1">Pendapatan Hari Ini</p>
        <p class="text-3xl font-bold text-green-600">
            Rp {{ number_format($revenueHariIni, 0, ',', '.') }}
        </p>
        <p class="text-xs text-gray-400 mt-1">{{ now()->format('d M Y') }}</p>
    </div>

    {{-- Transaksi Terbaru --}}
    <div class="bg-white rounded-xl shadow p-6 xl:col-span-2">
        <h2 class="font-bold text-lg mb-4">Transaksi Terbaru</h2>

        @if($transaksiTerbaru->isEmpty())
            <p class="text-gray-400 text-sm">Belum ada transaksi.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-gray-500 border-b">
                        <tr>
                            <th class="pb-2">ID Transaksi</th>
                            <th class="pb-2">Nama</th>
                            <th class="pb-2">Total</th>
                            <th class="pb-2">Status</th>
                            <th class="pb-2">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach($transaksiTerbaru as $trx)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 font-mono text-xs text-blue-600">{{ $trx->Transactionid }}</td>
                            <td class="py-2">{{ $trx->nameTransaction }}</td>
                            <td class="py-2 font-semibold">Rp {{ number_format($trx->amount, 0, ',', '.') }}</td>
                            <td class="py-2">
                                <span class="px-2 py-0.5 rounded-full text-xs font-medium
                                    {{ $trx->statustrans === 'Paid' ? 'bg-green-100 text-green-700' :
                                      ($trx->statustrans === 'pending' ? 'bg-yellow-100 text-yellow-700' :
                                       'bg-red-100 text-red-700') }}">
                                    {{ $trx->statustrans }}
                                </span>
                            </td>
                            <td class="py-2 text-gray-400">{{ \Carbon\Carbon::parse($trx->datetrans)->format('d M Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

</div>

@endsection