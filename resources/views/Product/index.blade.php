@extends('layouts.main')

@section('title', 'Product')

@section('content')

<h1>Data Product</h1>

<a href="{{ route('products.create') }}">
    Tambah Product
</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Stock</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>

    @foreach($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->stock }}</td>
        <td>{{ $product->price }}</td>
        <td>
            <a href="{{ route('products.show', $product->id) }}">Detail</a>
            <a href="{{ route('products.edit', $product->id) }}">Edit</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection