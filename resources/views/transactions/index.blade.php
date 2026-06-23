@extends('layouts.main')

@section('title', 'Transactions')

@section('content')

<div class="p-6 bg-gray-50 min-h-screen">
    
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Daftar Transaksi</h1>
            <p class="text-sm text-gray-500 mt-1">{{ $transactions->count() }} transaksi tersedia</p>
        </div>

        <a href="{{ route('transactions.create') }}"
           class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition shadow-sm">
           + Buat Transaksi Baru
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 px-4 py-3 rounded-lg bg-green-50 text-green-700 border border-green-200 text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if ($transactions->isEmpty())
        <div class="text-center py-16 bg-white rounded-xl border border-gray-200 shadow-sm">
            <p class="text-gray-500">Tidak ada transaksi yang tersedia.</p>
        </div>
    @else
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm">
            <table class="w-full text-sm border-collapse">
                <thead class="bg-gray-50 border-b border-gray-200 text-gray-600">
                    <tr>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider w-16">No</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">ID Transaksi</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Nama Item</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Jumlah</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Pajak</th>
                        <th class="px-6 py-3.5 text-center text-xs font-semibold uppercase tracking-wider w-28">Status</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3.5 text-center text-xs font-semibold uppercase tracking-wider w-44">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-700">
                    @foreach ($transactions as $transaction)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-400 font-medium">{{ $loop->iteration }}</td>
                            
                            <td class="px-6 py-4 font-mono text-xs text-gray-500">{{ $transaction->Transactionid }}</td>
                            
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $transaction->nameTransaction }}</td>
                            
                            <td class="px-6 py-4">{{ number_format($transaction->amount, 0, ',', '.') }}</td>
                            
                            <td class="px-6 py-4 text-gray-500">{{ number_format($transaction->tax, 0, ',', '.') }}</td>
                            
                            <td class="px-6 py-4 text-center">
                                @if(strtolower($transaction->statustrans) == 'paid')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700 border border-green-200">Paid</span>
                                @elseif(strtolower($transaction->statustrans) == 'pending')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-50 text-yellow-700 border border-yellow-200">Pending</span>
                                @elseif(strtolower($transaction->statustrans) == 'canceled')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-50 text-red-700 border border-red-200">Canceled</span>
                                @elseif(strtolower($transaction->statustrans) == 'deleted')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600 border border-gray-300 line-through">Deleted</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-50 text-gray-700 border border-gray-200">{{ $transaction->statustrans }}</span>
                                @endif
                            </td>
                            
                            <td class="px-6 py-4 text-gray-500 whitespace-nowrap">
                                {{ is_numeric($transaction->datetrans) || is_string($transaction->datetrans) ? date('d M Y', strtotime($transaction->datetrans)) : $transaction->datetrans->format('d M Y') }}
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap text-center text-xs font-medium">
                                <div class="flex items-center justify-center gap-1.5">
                                    <a href="{{ route('transactions.show', $transaction) }}" 
                                       class="text-blue-600 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 px-2.5 py-1.5 rounded-md transition">
                                       Lihat
                                    </a>
                                    <a href="{{ route('transactions.edit', $transaction) }}" 
                                       class="text-amber-600 hover:text-amber-900 bg-amber-50 hover:bg-amber-100 px-2.5 py-1.5 rounded-md transition">
                                       Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@endsection