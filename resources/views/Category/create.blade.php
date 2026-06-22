<!DOCTYPE html>
<html>
<head>
    <title>Create Category</title>
</head>
<body>
    <center>
        <h1>Create Category</h1>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <br><br>

            <div style="margin-bottom: 15px;">
                <label>ID :</label><br>
                <input type="text" name="id" style="width:300px;padding:5px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Name :</label><br>
                <input type="text" name="nameK" style="width:300px;padding:5px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Status :</label><br>
                <select name="status" style="width:312px;padding:5px;">
                    <option value="ready">Ready</option>
                    <option value="empty">Empty</option>
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label>Date :</label><br>
                <input type="date" name="date" style="width:300px;padding:5px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Description :</label><br>
                <input type="text" name="description" style="width:300px;padding:5px;">
            </div>

            <br><br>

            <button type="submit"
                    style="padding:10px 20px;font-size:15px;font-weight:bold;cursor:pointer;">
                Save
            </button>

        </form>
    </center>
</body>
</html>