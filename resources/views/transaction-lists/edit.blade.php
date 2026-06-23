<h1>Edit List Transaksi</h1>

<form method="POST" action="{{ route('transaction_lists.update', $transactionList->id) }}">
    @csrf
    @method('PUT')

    <div>
        <label>ID Struk (Receipt ID) :</label>
        <input type="text" name="Receiptid" value="{{ $transactionList->Receiptid }}" required>
    </div>
    <div>
        <label>ID Kasir :</label>
        <input type="text" name="Cashier_id" value="{{ $transactionList->Cashier_id }}">
    </div>
    <div>
        <label>Nama Kasir :</label>
        <input type="text" name="Cashier_name" value="{{ $transactionList->Cashier_name }}" required>
    </div>
    <div>
        <label>ID Toko :</label>
        <input type="text" name="Store_id" value="{{ $transactionList->Store_id }}">
    </div>
    <div>
        <label>Deskripsi :</label>
        <input type="text" name="Description" value="{{ $transactionList->Description }}" required>
    </div>
    <div>
        <label>Jumlah :</label>
        <input type="number" name="Quantity" value="{{ $transactionList->Quantity }}" required>
    </div>
    <div>
        <label>Total :</label>
        <input type="number" name="Total" value="{{ $transactionList->Total }}" required>
    </div>
    <br>
    <button type="submit">Update</button>
    <a href="{{ route('transaction_lists.index') }}"><button type="button">Batal</button></a>
</form>
