```php
<!DOCTYPE html>
<html>
<head>
    <title>Create Category</title>
</head>
<body>

    <h1>Create Category</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <label>ID</label><br>
        <input type="text" name="id"><br><br>

        <label>Name</label><br>
        <input type="text" name="nameK"><br><br>

        <label>Status</label><br>
        <select name="status">
            <option value="ready">Ready</option>
            <option value="empty">Empty</option>
        </select><br><br>

        <label>Date</label><br>
        <input type="date" name="date"><br><br>

        <label>Description</label><br>
        <textarea name="description"></textarea><br><br>

        <button type="submit">Save</button>
    </form>

</body>
</html>
```
