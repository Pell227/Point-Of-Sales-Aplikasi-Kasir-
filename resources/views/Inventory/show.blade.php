<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Barang</title>
</head>
<body>
    <h1>Detail Barang</h1>
    <a href="{{ route('inventory.index') }}">Kembali</a>
    <hr>

    <p><strong>Kode Barang:</strong> {{ $inventory->kode_barang }}</p>
    <p><strong>Nama Barang:</strong> {{ $inventory->nama_barang }}</p>
    <p><strong>Stok Tersedia:</strong> {{ $inventory->stok }}</p>
    <p><strong>Harga Beli:</strong> Rp {{ number_format($inventory->harga_beli, 0, ',', '.') }}</p>
    <p><strong>Harga Jual:</strong> Rp {{ number_format($inventory->harga_jual, 0, ',', '.') }}</p>
</body>
</html>