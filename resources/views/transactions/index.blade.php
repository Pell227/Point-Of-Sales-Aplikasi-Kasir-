<h1>Daftar data transaksi</h1>

<a href="{{ route('transactions.create') }}">Buat Transaksi Baru</a>
<br><br>

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
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->name }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->tax }}</td>
                    <td>{{ $transaction->status }}</td>
                    <td>{{ $transaction->date }}</td>
                    <td style="display: flex; gap: 10px;">
                        <a href="{{ route('transactions.edit', $transaction->id) }}">Edit</a> |
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>