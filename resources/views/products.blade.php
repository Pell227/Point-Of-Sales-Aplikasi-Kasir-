<!DOCTYPE html>
<html>
<head>
    <title>Kasir Product</title>

    <style>

        body{
            font-family: Arial;
            padding: 30px;
            background: #f4f4f4;
        }

        .container{
            width: 700px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        h1{
            text-align: center;
        }

        input{
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }

        button{
            margin-top: 15px;
            padding: 10px 20px;
            background: blue;
            color: white;
            border: none;
            cursor: pointer;
        }

        table{
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td{
            border: 1px solid #ddd;
        }

        th, td{
            padding: 10px;
            text-align: center;
        }

        th{
            background: #eee;
        }

    </style>

</head>
<body>

<div class="container">

    <h1>Data Product Kasir</h1>

    <form action="/products" method="POST">

        @csrf

        <input type="text" name="name" placeholder="Nama Product" required>

        <input type="number" name="stock" placeholder="Stock" required>

        <input type="number" name="price" placeholder="Harga" required>

        <button type="submit">Tambah Product</button>

    </form>

    <table>

        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Stock</th>
            <th>Harga</th>
        </tr>

        @foreach($products as $product)

        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->stock }}</td>
            <td>Rp {{ number_format($product->price) }}</td>
        </tr>

        @endforeach

    </table>

</div>

</body>
</html>