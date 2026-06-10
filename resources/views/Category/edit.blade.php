```php
<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
</head>
<body>

    <h1>Edit Category</h1>

    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>ID</label><br>
        <input type="text" name="id" value="{{ $category->id }}"><br><br>

        <label>Name</label><br>
        <input type="text" name="nameK" value="{{ $category->nameK }}"><br><br>

        <label>Status</label><br>
        <select name="status">
            <option value="ready" {{ $category->status == 'ready' ? 'selected' : '' }}>Ready</option>
            <option value="empty" {{ $category->status == 'empty' ? 'selected' : '' }}>Empty</option>
        </select><br><br>

        <label>Date</label><br>
        <input type="date" name="date" value="{{ $category->date }}"><br><br>

        <label>Description</label><br>
        <textarea name="description">{{ $category->description }}</textarea><br><br>

        <button type="submit">Update</button>
    </form>

</body>
</html>
```
