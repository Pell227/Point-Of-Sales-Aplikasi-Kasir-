@extends('layouts.main')

@section('title', 'Transaction List')

@section('content')

<h1>Transaction List</h1>

@if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

@if ($transactionLists->isEmpty())
    <p>Tidak ada data list transaksi yang tersedia.</p>
@else
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Transaksi</th>
                <th>ID Receipt</th>
                <th>Nama Kasir</th>
                <th>Deskripsi</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactionLists as $list)
                <tr>
                    <td>{{ $list->id }}</td>
                    <td>{{ $list->Transactionid }}</td>
                    <td>{{ $list->Receiptid }}</td>
                    <td>{{ $list->Cashier_name }}</td>
                    <td>{{ $list->Description }}</td>
                    <td>{{ $list->Quantity }}</td>
                    <td>{{ $list->Total }}</td>
                    <td style="display: flex; gap: 10px;">
                        <a href="{{ route('transaction_lists.show', $list->id) }}">Lihat</a> |
                        <a href="{{ route('transaction_lists.edit', $list->id) }}">Edit</a> |
                        <form action="{{ route('transaction_lists.destroy', $list->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus list transaksi ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection