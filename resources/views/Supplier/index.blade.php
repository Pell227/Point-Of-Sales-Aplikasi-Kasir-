<h1>Data Supplier</h1>

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
        </td>
    </tr>
    @endforeach
</table>