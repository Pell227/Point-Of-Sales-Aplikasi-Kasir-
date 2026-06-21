<h1>Tambah Product</h1>

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Nama Product">

    <input type="number" name="stock" placeholder="Stock">

    <input type="number" name="price" placeholder="Harga">

    <select name="supplier_id">
        <option value="">-- Pilih Supplier (opsional) --</option>
        @foreach($suppliers as $supplier)
            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
        @endforeach
    </select>

    <button type="submit">
        Simpan
    </button>
</form>