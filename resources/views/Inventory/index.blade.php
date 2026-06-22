<!DOCTYPE html>
<html>
<head>
    <title>Daftar Inventory</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body style="background-color:#f5f5f5;">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card shadow">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="fw-bold mb-0">Daftar Inventory Barang</h2>
                        <div>
                            <button type="button" class="btn btn-danger" id="btnSaktiLogoutInventory">
                                Logout
                            </button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <a href="{{ route('inventory.create') }}"
                           class="btn btn-primary">
                            Tambah Barang Baru
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th width="100">Kode</th>
                                    <th>Nama Barang</th>
                                    <th>Deskripsi</th>
                                    <th>Stok</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th width="200">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($inventories as $inventory)
                                    <tr>
                                        <td>#{{ $inventory->kode_barang }}</td>
                                        <td>{{ $inventory->nama_barang }}</td>
                                        <td>{{ $inventory->deskripsi }}</td>
                                        <td>{{ $inventory->stok }}</td>
                                        <td>Rp {{ number_format($inventory->harga_beli,0,',','.') }}</td>
                                        <td>Rp {{ number_format($inventory->harga_jual,0,',','.') }}</td>

                                        <td>
                                            <a href="{{ route('inventory.show', $inventory->id) }}"
                                               class="btn btn-info btn-sm text-white">
                                                Detail
                                            </a>

                                            <a href="{{ route('inventory.edit', $inventory->id) }}"
                                               class="btn btn-warning btn-sm text-white">
                                                Edit
                                            </a>

                                            {{-- TOMBOL HAPUS BARU: Menggunakan class khusus untuk dibaca JavaScript Fetch --}}
                                            <button type="button" 
                                                    class="btn btn-danger btn-sm btn-hapus-saktai" 
                                                    data-id="{{ $inventory->id }}">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            Tidak ada data barang di database.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
// ==========================================
// 1. SCRIPT SAKTI LOGOUT
// ==========================================
document.getElementById('btnSaktiLogoutInventory').addEventListener('click', function(e) {
    e.preventDefault();
    
    if (confirm('Apakah Anda yakin ingin logout?')) {
        fetch('/logout-web', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            window.location.href = '/';
        })
        .catch(error => {
            window.location.href = '/';
        });
    }
});

// ==========================================
// 2. SCRIPT SAKTI HAPUS (DELETE)
// ==========================================
document.querySelectorAll('.btn-hapus-saktai').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        
        const idBarang = this.getAttribute('data-id');
        
        if (confirm('Apakah Anda yakin ingin menghapus barang ini?')) {
            // Menembak rute detele resource bawaan laravel secara langsung via background
            fetch('/inventory/' + idBarang, {
                method: 'POST', // Menggunakan POST spoofing
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    _method: 'DELETE' // Memberitahu Laravel bahwa ini adalah request DELETE
                })
            })
            .then(response => {
                // Selesai menghapus, muat ulang halaman inventory agar data yang hilang sinkron
                window.location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
                window.location.reload();
            });
        }
    });
});
</script>
</body>
</html>