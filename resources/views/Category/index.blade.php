@extends('layouts.main')

@section('title', 'category')

@section('content')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.31.0/dist/tabler-icons.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .page-title { font-size: 1.4rem; font-weight: 600; color: #1a1a2e; margin: 0; }
        .page-subtitle { font-size: 0.8rem; color: #6c757d; margin: 0; }

        .card { border: 1px solid #e9ecef; border-radius: 12px; box-shadow: 0 1px 4px rgba(0,0,0,.04); }
        .card-body { padding: 1.5rem; }

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            gap: 12px;
        }
        .search-wrapper { position: relative; max-width: 280px; flex: 1; }
        .search-wrapper .ti {
            position: absolute; left: 10px; top: 50%;
            transform: translateY(-50%);
            font-size: 16px; color: #adb5bd; pointer-events: none;
        }
        .search-input {
            padding: 7px 12px 7px 34px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            font-size: 0.85rem;
            width: 100%;
        }
        .search-input:focus { outline: none; border: 1px solid #185FA5; box-shadow: 0 0 0 3px rgba(24,95,165,.12); }

        .btn-tambah {
            display: inline-flex; align-items: center; gap: 6px;
            background: #185FA5; color: #fff;
            border: none; border-radius: 8px;
            padding: 7px 16px; font-size: 0.85rem; font-weight: 500;
            text-decoration: none; white-space: nowrap;
        }
        .btn-tambah:hover { background: #0C447C; color: #fff; }

        .btn-logout {
            display: inline-flex; align-items: center; gap: 6px;
            background: #fff1f0; color: #a32d2d;
            border: 1px solid #f7c1c1; border-radius: 8px;
            padding: 7px 14px; font-size: 0.85rem; font-weight: 500;
            cursor: pointer;
        }
        .btn-logout:hover { background: #f7c1c1; }

        /* TABLE */
        .table-responsive { border-radius: 10px; overflow: hidden; border: 1px solid #e9ecef; }
        .table { margin: 0; font-size: 0.875rem; }
        .table thead th {
            background: #f8f9fa;
            font-size: 0.72rem; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.05em;
            color: #6c757d; border-bottom: 1px solid #dee2e6;
            padding: 10px 14px; white-space: nowrap;
        }
        .table tbody td { padding: 12px 14px; vertical-align: middle; border-color: #f0f0f0; }
        .table tbody tr:hover { background: #f8f9fa; }
        .table tbody tr:last-child td { border-bottom: none; }

        /* ID chip */
        .id-chip {
            font-family: 'Courier New', monospace;
            font-size: 0.75rem; font-weight: 600;
            color: #6c757d; background: #f1f3f5;
            border: 1px solid #dee2e6;
            border-radius: 6px; padding: 2px 8px;
        }

        /* STATUS BADGE */
        .badge-status {
            display: inline-flex; align-items: center; gap: 5px;
            font-size: 0.72rem; font-weight: 600;
            padding: 3px 10px; border-radius: 999px;
        }
        .badge-aktif    { background: #eaf3de; color: #3b6d11; }
        .badge-nonaktif { background: #fcebeb; color: #a32d2d; }
        .badge-dot { width: 6px; height: 6px; border-radius: 50%; }
        .badge-aktif .badge-dot    { background: #3b6d11; }
        .badge-nonaktif .badge-dot { background: #a32d2d; }

        /* DESC truncate */
        .desc-cell {
            max-width: 220px;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
            color: #6c757d; font-size: 0.82rem;
        }

        /* ACTION BUTTONS */
        .btn-aksi {
            display: inline-flex; align-items: center; gap: 4px;
            font-size: 0.75rem; font-weight: 500;
            padding: 5px 10px; border-radius: 7px;
            border: 1px solid; cursor: pointer; text-decoration: none;
            transition: filter .15s;
        }
        .btn-aksi:hover { filter: brightness(.93); }
        .btn-aksi-detail  { background: #e6f1fb; color: #0c447c; border-color: #b5d4f4; }
        .btn-aksi-edit    { background: #faeeda; color: #633806; border-color: #fac775; }
        .btn-aksi-hapus   { background: #fcebeb; color: #791f1f; border-color: #f7c1c1; }

        .table-footer {
            display: flex; justify-content: space-between; align-items: center;
            padding: 10px 14px;
            background: #f8f9fa;
            border-top: 1px solid #e9ecef;
            font-size: 0.8rem; color: #6c757d;
        }

        /* ALERT */
        .alert-success-custom {
            background: #eaf3de; border: 1px solid #c0dd97;
            border-radius: 8px; padding: 10px 14px;
            font-size: 0.85rem; color: #3b6d11;
            display: flex; align-items: center; gap: 8px;
            margin-bottom: 1rem;
        }
        .alert-danger-custom {
            background: #fcebeb; border: 1px solid #f7c1c1;
            border-radius: 8px; padding: 10px 14px;
            font-size: 0.85rem; color: #a32d2d;
            display: flex; align-items: center; gap: 8px;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-11">

            {{-- FLASH MESSAGE --}}
            @if (session('success'))
                <div class="alert-success-custom">
                    <i class="ti ti-circle-check" style="font-size:18px;"></i>
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert-danger-custom">
                    <i class="ti ti-alert-circle" style="font-size:18px;"></i>
                    {{ session('error') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">

                    {{-- HEADER --}}
                    <div class="page-header">
                        <div>
                            <h1 class="page-title">Daftar Kategori</h1>
                            <p class="page-subtitle">Kelola semua kategori produk</p>
                        </div>
                    </div

                    {{-- TOOLBAR --}}
                    <div class="toolbar">
                        <div class="search-wrapper">
                            <i class="ti ti-search"></i>
                            <input type="text" class="search-input"
                                   id="searchInput"
                                   placeholder="Cari kategori..."
                                   oninput="filterTable()">
                        </div>

                        <a href="{{ route('categories.create') }}" class="btn-tambah">
                            <i class="ti ti-plus"></i> Tambah Kategori
                        </a>
                    </div>

                    {{-- TABLE --}}
                    <div class="table-responsive">
                        <table class="table table-borderless" id="mainTable">
                            <thead>
                                <tr>
                                    <th style="width:55px;">ID</th>
                                    <th>Nama Kategori</th>
                                    <th style="width:110px;">Status</th>
                                    <th style="width:120px;">Tanggal</th>
                                    <th>Deskripsi</th>
                                    <th style="width:145px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                {{-- PERBAIKAN 2: Mengubah alias looping menjadi $item agar tidak merusak $category bawaan controller --}}
                                @forelse ($category as $item)
                                    <tr>
                                        <td>
                                            <span class="id-chip">#{{ str_pad($item->id, 3, '0', STR_PAD_LEFT) }}</span>
                                        </td>
                                        <td style="font-weight:500;">
                                            {{ $item->nameK }}
                                        </td>
                                        <td>
                                            @if ($item->status == 'aktif'|| $item->status == 'ready')
                                                <span class="status-badge aktif">
                                                    <span class="dot"></span> Aktif
                                                </span>
                                            @else
                                                <span class="status-badge nonaktif">
                                                    <span class="dot"></span> Nonaktif
                                                </span>
                                            @endif
                                        </td>
                                        <td style="font-size:0.82rem;color:#6c757d;">
                                            {{ \Carbon\Carbon::parse($item->date)->translatedFormat('d M Y') }}
                                        </td>
                                        <td>
                                            <span class="desc-cell">{{ $item->description ?? '-' }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="{{ route('categories.show', $item->id) }}"
                                                   class="btn-aksi btn-aksi-detail">
                                                    <i class="ti ti-eye"></i> Detail
                                                </a>
                                                <a href="{{ route('categories.edit', $item->id) }}"
                                                   class="btn-aksi btn-aksi-edit">
                                                    <i class="ti ti-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('categories.destroy', $item->id) }}"
                                                      method="POST" class="d-inline"
                                                      onsubmit="return confirm('Hapus kategori \'{{ $item->nameK }}\'?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-aksi btn-aksi-hapus" style="border:none;">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-5">
                                            <i class="ti ti-folder-off" style="font-size:2.5rem;color:#dee2e6;display:block;margin-bottom:.5rem;"></i>
                                            <span style="color:#adb5bd;font-size:.85rem;">Belum ada data kategori.</span><br>
                                            <a href="{{ route('categories.create') }}" class="btn-tambah d-inline-flex mt-3">
                                                <i class="ti ti-plus"></i> Tambah Kategori Pertama
                                            </a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="table-footer">
                            {{-- PERBAIKAN 3: Memastikan hitungan count() memanggil collection utama ($category) --}}
                            @if(isset($category) && method_exists($category, 'count'))
                                <span id="footerCount">Menampilkan {{ $category->count() }} kategori</span>
                                <span>{{ $category->count() }} total</span>
                            @else
                                <span id="footerCount">Menampilkan 0 kategori</span>
                                <span>0 total</span>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
function filterTable() {
    const q = document.getElementById('searchInput').value.toLowerCase();
    const rows = document.querySelectorAll('#tableBody tr');
    let count = 0;
    
    if (rows.length === 1 && rows[0].querySelector('.text-center')) return;

    rows.forEach(row => {
        const match = row.textContent.toLowerCase().includes(q);
        row.style.display = match ? '' : 'none';
        if (match) count++;
    });
    document.getElementById('footerCount').textContent = 'Menampilkan ' + count + ' kategori';
}
</script>

</body>
</html>
@endsection