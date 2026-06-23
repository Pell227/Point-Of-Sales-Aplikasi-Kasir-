@extends('layouts.main')

@section('title', 'Transaction List')

@section('content')

<div class="p-6 bg-gray-50 min-h-screen">
    
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Transaction List</h1>
            <p class="text-sm text-gray-500 mt-1">{{ $transactionLists->count() }} item list transaksi tersedia</p>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-4 px-4 py-3 rounded-lg bg-green-50 text-green-700 border border-green-200 text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if ($transactionLists->isEmpty())
        <div class="text-center py-16 bg-white rounded-xl border border-gray-200 shadow-sm">
            <p class="text-gray-500">Tidak ada data list transaksi yang tersedia.</p>
        </div>
    @else
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm">
            <table class="w-full text-sm border-collapse">
                <thead class="bg-gray-50 border-b border-gray-200 text-gray-600">
                    <tr>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider w-16">No</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">ID Transaksi</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">ID Receipt</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Nama Kasir</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Deskripsi</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider w-24">Jumlah</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Total</th>
                        <th class="px-6 py-3.5 text-center text-xs font-semibold uppercase tracking-wider w-52">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-700">
                    @foreach ($transactionLists as $list)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-400 font-medium">{{ $loop->iteration }}</td>
                            
                            <td class="px-6 py-4 font-mono text-xs text-gray-500">{{ $list->Transactionid }}</td>
                            
                            <td class="px-6 py-4 font-mono text-xs text-gray-600">{{ $list->Receiptid }}</td>
                            
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $list->Cashier_name }}</td>
                            
                            <td class="px-6 py-4 text-gray-500 truncate max-w-xs">{{ $list->Description }}</td>
                            
                            <td class="px-6 py-4 font-medium text-gray-700">{{ $list->Quantity }}</td>
                            
                            <td class="px-6 py-4 font-semibold text-gray-800">
                                {{ number_format($list->Total, 0, ',', '.') }}
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap text-center text-xs font-medium">
                                <div class="flex items-center justify-center gap-1.5">
                                    <a href="{{ route('transaction_lists.show', $list->id) }}" 
                                       class="text-blue-600 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 px-2.5 py-1.5 rounded-md transition">
                                       Lihat
                                    </a>
                                    <a href="{{ route('transaction_lists.edit', $list->id) }}" 
                                       class="text-amber-600 hover:text-amber-900 bg-amber-50 hover:bg-amber-100 px-2.5 py-1.5 rounded-md transition">
                                       Edit
                                    </a>
                                    <form action="{{ route('transaction_lists.destroy', $list->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus list transaksi ini?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 px-2.5 py-1.5 rounded-md transition">
                                            Hapus
                                        </button>
                                    </form>
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