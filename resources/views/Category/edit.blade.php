<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
</head>
<body>
    <center>
        <h1>Edit Category</h1>
        <br>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">ID :</label>
                <input type="text" name="id" value="{{ $category->id }}" style="width: 300px; padding: 5px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Name :</label>
                <input type="text" name="nameK" value="{{ $category->nameK }}" style="width: 300px; padding: 5px;">
            </div>
            
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Status :</label>
                <select name="status" style="width: 312px; padding: 5px; cursor:pointer;">
                    <option value="ready" {{ $category->status == 'ready' ? 'selected' : '' }}>Ready</option>
                    <option value="empty" {{ $category->status == 'empty' ? 'selected' : '' }}>Empty</option>
                </select>    
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Date :</label>
                <input type="date" name="Date" value="{{ $category->Date }}" style="width: 300px; padding: 5px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Description :</label>
                <input type="text" name="description" value="{{ $category->description }}" style="width: 300px; padding: 5px;">
            </div>
            <br><br>
            <button type="submit" style="padding: 10px 20px; font-size: 15px; font-weight: bold; cursor: pointer;">Update</button>
        </form>
    </center>
</body>
</html>
