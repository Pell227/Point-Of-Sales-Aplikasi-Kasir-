<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Inventory</title>
</head>
<body>

    <div style="position: fixed; top: 15px; right: 20px; z-index: 9999;">
        <form action="{{ route('logout.web') }}" method="POST">
            @csrf
            <button type="submit" 
                style="background-color: red; color: white; padding: 8px 16px; 
                    border: none; border-radius: 5px; cursor: pointer; font-size: 14px;">
                Logout
            </button>
        </form>
    </div>
    <h1>Daftar Inventory Barang</h1>

    @if(session('success'))
        <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('inventory.create') }}">Tambah Barang Baru</a>
    <hr><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Deskripsi</th>
                <th>Stok</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- Cek apakah data inventories ada dan tidak kosong --}}
            @if(isset($inventories) && $inventories->count() > 0)
                @foreach($inventories as $item)
                <tr>
                    <td>{{ $item->kode_barang }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->deskripsi ?? '-' }}</td>
                    <td>
                        @if($item->stok < 3)
                            <span style="color: red; font-weight: bold;">{{ $item->stok }} !!</span>
                        @else
                            {{ $item->stok }}
                        @endif
                    </td>
                    <td>Rp {{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->harga_jual, 0, ',', '.') }}</td>
                    <td>
                        {{-- Tombol Edit --}}
                        <button type="button" onclick="window.location.href='{{ route('inventory.edit', $item->id) }}'">Edit</button>
                        
                        {{-- Tombol Hapus --}}
                        <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" style="color: red">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" style="text-align: center; color: gray;">
                        Tidak ada data barang di database.
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</body>
</html>