@extends('layouts.main')

@section('title', 'Supplier')

@section('content')

<h1>Data Supplier</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('suppliers.create') }}">
    Tambah Supplier
</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Aksi</th>
    </tr>

    @foreach($suppliers as $supplier)
    <tr>
        <td>{{ $supplier->id }}</td>
        <td>{{ $supplier->name }}</td>
        <td>{{ $supplier->phone }}</td>
        <td>{{ $supplier->address }}</td>
        <td>
            <a href="{{ route('suppliers.show',$supplier->id) }}">Detail</a>
            <a href="{{ route('suppliers.edit',$supplier->id) }}">Edit</a>

            <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus supplier ini?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection