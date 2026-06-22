<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
</head>
<body>
    <center>
        <h1>Edit Category</h1>
        <br>
        
        {{-- Menambahkan ID 'formEditKategori' agar bisa dikontrol oleh JavaScript --}}
        <form id="formEditKategori" action="/categories/{{ $category->id }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">ID :</label>
                {{-- ID sebaiknya dibuat readonly agar user tidak sembarangan mengubah primary key --}}
                <input type="text" name="id" value="{{ $category->id }}" style="width: 300px; padding: 5px;" readonly>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Name :</label>
                <input type="text" name="nameK" value="{{ $category->nameK }}" style="width: 300px; padding: 5px;" required>
            </div>
            
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Status :</label>
                <select name="status" style="width: 312px; padding: 5px; cursor:pointer;">
                    <option value="ready">Aktif / Ready</option>
                    <option value="empty">Nonaktif / Empty</option>
                </select>    
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Date :</label>
                {{-- Menyesuaikan nama attribute 'date' huruf kecil sesuai pengecekan Carbon di index --}}
                <input type="date" name="date" value="{{ $category->date ?? $category->Date }}" style="width: 300px; padding: 5px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Description :</label>
                <input type="text" name="description" value="{{ $category->description }}" style="width: 300px; padding: 5px;">
            </div>
            <br><br>
            
            <button type="submit" style="padding: 10px 20px; font-size: 15px; font-weight: bold; cursor: pointer;">Update</button>
            <a href="/categories" style="padding: 10px 20px; font-size: 15px; text-decoration: none; color: black; border: 1px solid #ccc; margin-left: 10px;">Batal</a>
        </form>
    </center>

    {{-- SCRIPT SAKTI: Mengamankan Redirect Balik ke /categories --}}
    <script>
    document.getElementById('formEditKategori').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
       
        fetch(this.action, {
            method: 'POST', 
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            window.location.href = '/categories';
        })
        .catch(error => {
            window.location.href = '/categories';
        });
    });
    </script>
</body>
</html>