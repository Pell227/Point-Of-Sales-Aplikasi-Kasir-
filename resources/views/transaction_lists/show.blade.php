<h1>Detail List Transaksi</h1>

<p><strong>ID List Transaksi :</strong> {{ $transactionLists->Transactionid }}</p>
<p><strong>ID Struk :</strong> {{ $transactionLists->Receiptid }}</p>
<p><strong>ID Kasir :</strong> {{ $transactionLists->Cashier_id }}</p>
<p><strong>Nama Kasir :</strong> {{ $transactionLists->Cashier_name }}</p>
<p><strong>ID Toko :</strong> {{ $transactionLists->Store_id }}</p>
<p><strong>Deskripsi :</strong> {{ $transactionLists->Description }}</p>
<p><strong>Jumlah :</strong> {{ $transactionLists->Quantity }}</p>
<p><strong>Total :</strong> {{ $transactionLists->Total }}</p>

<br>
<a href="{{ route('transaction-lists.edit', ['transaction_list' => $transactionLists->id]) }}"><button type="button">Edit</button></a>
<a href="{{ route('transaction-lists.index') }}"><button type="button">Kembali</button></a>

@endsection