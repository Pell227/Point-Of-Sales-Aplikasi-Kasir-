<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang</title>
</head>
<body>
    <h1>Tambah Barang Baru</h1>
    <a href="{{ route('inventory.index') }}">Kembali ke Daftar</a>
    <hr>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('inventory.store') }}" method="POST">
        @csrf
        <div>
            <label>Kode Barang:</label><br>
            <input type="text" name="kode_barang" value="{{ old('kode_barang') }}" required>
        </div><br>

        <div>
            <label>Nama Barang:</label><br>
            <input type="text" name="nama_barang" value="{{ old('nama_barang') }}" required>
        </div><br>

        <div>
            <label>Deskripsi:</label><br>
            <textarea name="deskripsi" rows="3" cols="30">{{ old('deskripsi') }}</textarea>
        </div><br>

        <div>
            <label>Stok:</label><br>
            <input type="number" name="stok" value="{{ old('stok') }}" required>
        </div><br>

        <div>
            <label>Harga Beli:</label><br>
            <input type="number" name="harga_beli" value="{{ old('harga_beli') }}" required>
        </div><br>

        <div>
            <label>Harga Jual:</label><br>
            <input type="number" name="harga_jual" value="{{ old('harga_jual') }}" required>
        </div><br>

        <button type="submit">Simpan Barang</button>
    </form>
</body>
</html>