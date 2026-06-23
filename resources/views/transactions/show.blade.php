<h1> {{ $transactions->nameTransaction }} </h1>

<p><strong>ID Transaksi:</strong> {{ $transactions->Transactionid }}</p>
<p><strong>Nama Item:</strong> {{ $transactions->nameTransaction }}</p>
<p><strong>Jumlah:</strong> {{ $transactions->amount }}</p>
<p><strong>Pajak:</strong> {{ $transactions->tax }}</p>
<p><strong>Status:</strong> {{ $transactions->statustrans }}</p>
<p><strong>Tanggal:</strong> {{ $transactions->datetrans }}</p>
<a href="{{ route('transactions.edit', ['transaction' => $transactions]) }}">Edit Transaksi</a>
<a href="{{ route('transactions.index') }}">Kembali ke Daftar Transaksi</a>
