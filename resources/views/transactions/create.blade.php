<h1>Membuat struck transaksi</h1>
<form method="POST" action="{{ route('transactions.store') }}">
    @csrf

    <div>
        <label for="name">Nama Transaksi :</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    </div>
    <div>
        <label for="amount">Jumlah :</label>
        <input type="number" id="amount" name="amount" value="{{ old('amount') }}" required>
    </div>
    <div>
        <label for="tax">Pajak :</label>
        <input type="number" id="tax" name="tax" value="{{ old('tax') }}" required>
    </div>
    <div>
        <label for="status">Status :</label>
        <select id="status" name="status" required>
            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="paid" {{ old('status') == 'paid' ? 'selected' : '' }}>Paid</option>
            <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>
    <div>
        <label for="date">Tanggal :</label>
        <input type="date" id="date" name="date" value="{{ old('date') }}" required>
    </div>
    <button type="submit">Simpan Transaksi</button>
</form>