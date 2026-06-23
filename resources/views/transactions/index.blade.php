@extends('layouts.main')

@section('title', 'transactions')

@section('content')

<h1>Daftar data transaksi</h1>

<a href="{{ route('transactions.create') }}">Buat transaksi baru</a>
<br><br>

@if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

@if ($transactions->isEmpty())
    <p>Tidak ada transaksi yang tersedia.</p>
@else
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Item</th>
                <th>Jumlah</th>
                <th>Pajak</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->Transactionid }}</td>
                    <td>{{ $transaction->nameTransaction }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->tax }}</td>
                    <td>{{ $transaction->statustrans }}</td>
                    <td>{{ $transaction->datetrans }}</td>
                    <td style="display: flex; gap: 10px;">
                        <a href="{{ route('transactions.show', $transaction) }}">Lihat</a> |
                        <a href="{{ route('transactions.edit', $transaction) }}">Edit</a> |
                        <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection