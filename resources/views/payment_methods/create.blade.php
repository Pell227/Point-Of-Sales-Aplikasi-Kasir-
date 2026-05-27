<h1>Tambah Metode Pembayaran</h1>

<form action="{{ route('paymentMethods.store') }}" method="POST">

    @csrf

    <label>Metode Pembayaran</label>
    <br>

    <select name="payment_method">

        <option value="Tunai">Tunai</option>
        <option value="Non Tunai">Non Tunai</option>

    </select>

    <br><br>

    <label>Jenis Pembayaran</label>
    <br>

    <select name="payment_type">

        <option value="">-- Pilih --</option>
        <option value="QRIS">QRIS</option>
        <option value="Transfer">Transfer</option>

    </select>

    <br><br>

    <label>Tipe</label>
    <br>

    <select name="payment_category">

        <option value="">-- Pilih --</option>
        <option value="E-Wallet">E-Wallet</option>
        <option value="Mobile Banking">Mobile Banking</option>

    </select>

    <br><br>

    <label>Provider</label>
    <br>

    <input type="text" name="provider">

    <br><br>

    <button type="submit">
        Simpan
    </button>

</form>