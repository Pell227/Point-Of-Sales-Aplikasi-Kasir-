<h1>Edit data transaksi</h1>
<form method="POST" action="{{ route('transactions.update', ['transaction' => $transactions]) }}">
    @csrf
    @method('PUT')
    
    <div>
        <label>Nama Item :</label>
        <input type="text" name="nameTransaction" value="{{ $transactions->nameTransaction }}" required>
    </div>  
    <div>
        <label>Jumlah :</label>
        <input type="number" name="amount" value="{{ $transactions->amount }}" required>
    </div>
    <div>
        <label>Pajak :</label>
        <input type="number" name="tax" value="{{ $transactions->tax }}" required>
    </div>
    <div>
        <label>Status :</label>
        <select name="statustrans" required>
            <option value="pending" {{ $transactions->statustrans == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="paid" {{ $transactions->statustrans == 'paid' ? 'selected' : '' }}>Paid</option>
            <option value="canceled" {{ $transactions->statustrans == 'canceled' ? 'selected' : '' }}>Canceled</option>
        </select>
    </div>
    <button type="submit">Update</button>
    <a href="{{ route('transactions.index') }}">Batal</a>
</form>