<h1>Edit Supplier</h1>

<form action="{{ route('suppliers.update',$supplier->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $supplier->name }}">

    <input type="text" name="phone" value="{{ $supplier->phone }}">

    <input type="text" name="address" value="{{ $supplier->address }}">

    <button type="submit">
        Update
    </button>
</form>