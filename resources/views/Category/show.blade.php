<!DOCTYPE html>
<html>
<head>
    <title>Show Category</title>
</head>
<body>

    <h1>Category Detail</h1>

    <p><b>ID:</b> {{ $category->id }}</p>

    <p><b>Name:</b> {{ $category->nameK }}</p>

    <p><b>Status:</b> {{ $category->status }}</p>

    <p><b>Date:</b> {{ $category->date }}</p>

    <p><b>Description:</b> {{ $category->description }}</p>

    <a href="{{ route('categories.index') }}">Back</a>

</body>
</html>
