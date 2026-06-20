<!DOCTYPE html>
<html>
<head>
    <title>Create Category</title>
</head>
<body>
    <center>
        <h1>Create Category</h1>
    
            <form action="{{ route('categories.create') }}" method="POST">
                @csrf

                <br><br>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px;">ID :</label>
                    <input type="text" name="id" style="width: 300px; padding: 5px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px;">Name :</label>
                    <input type="text" name="nameK" style="width: 300px; padding: 5px;">
                </div>
                
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px;">Status :</label>
                    <select name="status" style="width: 312px; padding: 5px; cursor:pointer;">
                        <option value="ready">Ready</option>
                        <option value="empty">Empty</option>
                    </select>    
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px;">Date :</label>
                    <input type="date" name="Date" style="width: 300px; padding: 5px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px;">Description :</label>
                    <input type="text" name="description" style="width: 300px; padding: 5px;">
                </div>

                <br><br>
                <button type="submit" style="padding: 10px 20px; font-size: 15px; font-weight: bold; cursor: pointer;">Save</button> 
            </form>
    </center>
</body>
</html>
