<h1>Edit data transaksi</h1>
<form method="POST" action="{{ route('transactions.update', $transactions->id) }}">
    @csrf
    @method('PUT')
    
    <div>
        <label>Nama Item:</label>
        <input type="text" name="name" value="{{ $transactions->name }}" required>
    </div>  
    <div>
        <label>Jumlah:</label>
        <input type="number" name="amount" value="{{ $transactions->amount }}" required>
    </div>
    <div>
        <label>Pajak:</label>
        <input type="number" name="tax" value="{{ $transactions->tax }}" required>
    </div>
    <div>
        <label>Status:</label>
        <select name="status" required>
            <option value="pending" {{ $transactions->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="paid" {{ $transactions->status == 'paid' ? 'selected' : '' }}>Paid</option>
            <option value="completed" {{ $transactions->status == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>
    <button type="submit">Update Transaksi</button>
</form>