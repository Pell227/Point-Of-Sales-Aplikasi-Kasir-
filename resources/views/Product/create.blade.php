<h1>Tambah Product</h1>

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Nama Product">

    <input type="number" name="stock" placeholder="Stock">

    <input type="number" name="price" placeholder="Harga">

    <button type="submit">
        Simpan
    </button>
</form>