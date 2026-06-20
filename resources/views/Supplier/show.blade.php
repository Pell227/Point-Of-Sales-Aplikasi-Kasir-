<h1>Detail Supplier</h1>

<p>ID : {{ $supplier->id }}</p>
<p>Nama : {{ $supplier->name }}</p>
<p>Phone : {{ $supplier->phone }}</p>
<p>Alamat : {{ $supplier->address }}</p>

<a href="{{ route('suppliers.index') }}">
    Kembali
</a>