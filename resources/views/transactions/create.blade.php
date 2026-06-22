<h1>Membuat struck transaksi</h1>

@if (session('created_transaction'))
    @php 
        $ct = session('created_transaction'); 
    @endphp
        <h4> Transaksi berhasil disimpan!</h4>
            <p><strong>ID Transaksi: </strong> {{ $ct['Transactionid'] }}</p>
            <p><strong>Nama Item: </strong> {{ $ct['nameTransaction'] }}</p>
            <p><strong>Jumlah: </strong> {{ $ct['amount'] }}</p>
            <p><strong>Pajak: </strong> {{ $ct['tax'] }}</p>
            <p><strong>Status: </strong> {{ $ct['statustrans'] }}</p>
            <p><strong>Tanggal: </strong> {{ $ct['datetrans'] }}</p>

    </div>
@endif

<form method="POST" action="{{ route('transactions.store') }}">
    @csrf

    <div>
        <label for="nameTransaction">Nama Transaksi :</label>
        <input type="text" id="nameTransaction" name="nameTransaction" value="{{ old('nameTransaction') }}" required>
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
        <label for="statustrans">Status :</label>
        <select id="statustrans" name="statustrans" required>
            <option value="pending" {{ old('statustrans') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="paid" {{ old('statustrans') == 'paid' ? 'selected' : '' }}>Paid</option>
            <option value="canceled" {{ old('statustrans') == 'canceled' ? 'selected' : '' }}>Canceled</option>
        </select>
    </div>
    <div>
        <label for="datetrans">Tanggal :</label>
        <input type="date" id="datetrans" name="datetrans" value="{{ old('datetrans') }}" required>
    </div>
    <button type="submit">Simpan Transaksi</button>
    <a href="{{ route('transactions.index') }}"><button type="button">kembali</button></a>
</form>