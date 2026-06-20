<!DOCTYPE html>
<html>
<head>
    <title>Category Index</title>
</head>
<body>

    <h1>Category List</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('category.create') }}">Add Category</a>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>Date</th>
            <th>Description</th>
            <th>Action</th>
        </tr>

        @foreach($category as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nameK }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->date }}</td>
            <td>{{ $item->description }}</td>
            <td>
                <a href="{{ route('categories.show', $item->id) }}" style="margin-right: 5px;">Show</a>
                <a href="{{ route('categories.edit', $item->id) }}" style="margin-right: 5px;">Edit</a>

                <form action="{{ route('categories.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button type="submit"onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>

</body>
</html>
```
