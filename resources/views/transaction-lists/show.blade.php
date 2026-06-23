<h1>Detail List Transaksi</h1>

<p><strong>ID List Transaksi :</strong> {{ $transactionList->Transactionid }}</p>
<p><strong>ID Struk :</strong> {{ $transactionList->Receiptid }}</p>
<p><strong>ID Kasir :</strong> {{ $transactionList->Cashier_id }}</p>
<p><strong>Nama Kasir :</strong> {{ $transactionList->Cashier_name }}</p>
<p><strong>ID Toko :</strong> {{ $transactionList->Store_id }}</p>
<p><strong>Deskripsi :</strong> {{ $transactionList->Description }}</p>
<p><strong>Jumlah :</strong> {{ $transactionList->Quantity }}</p>
<p><strong>Total :</strong> {{ $transactionList->Total }}</p>

<br>
<a href="{{ route('transaction_lists.edit', $transactionList->id) }}"><button type="button">Edit</button></a>
<a href="{{ route('transaction_lists.index') }}"><button type="button">Kembali</button></a>
