<h1>Tambah Supplier</h1>

<form action="{{ route('suppliers.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Nama Supplier">

    <input type="text" name="phone" placeholder="Nomor Telepon">

    <input type="text" name="address" placeholder="Alamat">

    <button type="submit">
        Simpan
    </button>
</form>