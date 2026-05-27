<!DOCTYPE html>
<html>
<head>
    <title>Edit Payment Method</title>
</head>
<body>

    <h1>Edit Metode Pembayaran</h1>

    <form action="{{ route('paymentMethods.update', $paymentMethod->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <label>Metode Pembayaran</label>
        <br>
        <input type="text"
               name="payment_method"
               value="{{ $paymentMethod->payment_method }}">

        <br><br>

        <label>Jenis Pembayaran</label>
        <br>
        <input type="text"
               name="payment_type"
               value="{{ $paymentMethod->payment_type }}">

        <br><br>

        <label>Tipe</label>
        <br>
        <input type="text"
               name="payment_category"
               value="{{ $paymentMethod->payment_category }}">

        <br><br>

        <label>Provider</label>
        <br>
        <input type="text"
               name="provider"
               value="{{ $paymentMethod->provider }}">

        <br><br>

        <button type="submit">
            Update
        </button>

    </form>

</body>
</html>