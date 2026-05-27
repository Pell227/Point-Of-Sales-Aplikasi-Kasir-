<!DOCTYPE html>
<html>
<head>
    <title>Detail Payment Method</title>
</head>
<body>

    <h1>Detail Metode Pembayaran</h1>

    <p>
        <strong>ID :</strong>
        {{ $paymentMethods->id }}
    </p>

    <p>
        <strong>Nama Metode :</strong>
        {{ $paymentMethods->method_name }}
    </p>

    <p>
        <strong>Description :</strong>
        {{ $paymentMethods->description }}
    </p>

    <br>

    <a href="{{ route('paymentMethods.index') }}">
        Kembali
    </a>

</body>
</html>