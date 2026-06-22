<h1>Edit List Transaksi</h1>

<form method="POST" action="{{ route('transaction-lists.update', ['transaction_list' => $transactionLists->id]) }}">
    @csrf
    @method('PUT')

    <div>
        <label>ID Struk (Receipt ID) :</label>
        <input type="text" name="Receiptid" value="{{ $transactionLists->Receiptid }}" required>
    </div>
    <div>
        <label>ID Kasir :</label>
        <input type="text" name="Cashier_id" value="{{ $transactionLists->Cashier_id }}">
    </div>
    <div>
        <label>Nama Kasir :</label>
        <input type="text" name="Cashier_name" value="{{ $transactionLists->Cashier_name }}" required>
    </div>
    <div>
        <label>ID Toko :</label>
        <input type="text" name="Store_id" value="{{ $transactionLists->Store_id }}">
    </div>
    <div>
        <label>Deskripsi :</label>
        <input type="text" name="Description" value="{{ $transactionLists->Description }}" required>
    </div>
    <div>
        <label>Jumlah :</label>
        <input type="number" name="Quantity" value="{{ $transactionLists->Quantity }}" required>
    </div>
    <div>
        <label>Total :</label>
        <input type="number" name="Total" value="{{ $transactionLists->Total }}" required>
    </div>
    <br>
    <button type="submit">Update</button>
    <a href="{{ route('transaction-lists.index') }}"><button type="button">Batal</button></a>
</form>

@endsection