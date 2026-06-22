<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request)
{
    $query = Supplier::query();

    if ($request->search) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    return response()->json(
        $query->get()
    );
}

    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'address' => 'required'
        ]);
    
        $supplier = Supplier::create($request->all());

        return response()->json($supplier, 201);
    }

    public function show(string $id)
    {
        return response()->json(Supplier::findOrFail($id));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
        'name' => 'required|max:100',
        'phone' => 'required|max:20',
        'address' => 'required|max:255'
        ]);
    
        $supplier = Supplier::findOrFail($id);

        $supplier->update($request->all());

        return response()->json($supplier);
    }

    public function destroy(string $id)
    {
        Supplier::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Supplier deleted'
        ]);
    }
}