
<h1>Detail Product</h1>

<p>ID : {{ $product->id }}</p>
<p>Nama : {{ $product->name }}</p>
<p>Stock : {{ $product->stock }}</p>
<p>Harga : Rp {{ number_format($product->price) }}</p>

<a href="{{ route('products.index') }}">
    Kembali
</a>