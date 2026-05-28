<h1> {{ $transactions->name }} </h1>

<p><strong>ID Transaksi:</strong> {{ $transactions->id }}</p>
<p><strong>Nama Item:</strong> {{ $transactions->name }}</p>
<p><strong>Jumlah:</strong> {{ $transactions->amount }}</p>
<p><strong>Pajak:</strong> {{ $transactions->tax }}</p>
<p><strong>Status:</strong> {{ $transactions->status }}</p>
<p><strong>Tanggal:</strong> {{ $transactions->date }}</p>
<a href="{{ route('transactions.index') }}">Kembali ke Daftar Transaksi</a>
