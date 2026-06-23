<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::latest()->get();
        return view('Inventory.index', compact('inventories'));
    }

    public function create()
    {
        return view('Inventory.create');
    }

   public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'stok'        => 'required|numeric',
            'harga_beli'  => 'required|numeric',
            'harga_jual'  => 'required|numeric',
        ]);

        DB::table('inventories')->insert([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'deskripsi'   => $request->deskripsi, 
            'stok'        => $request->stok,
            'harga_beli'  => $request->harga_beli,
            'harga_jual'  => $request->harga_jual,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        return redirect()->route('inventory.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function show(Inventory $inventory)
    {
        return view('Inventory.show', compact('inventory'));
    }

    public function edit(Inventory $inventory)
    {
        return view('Inventory.edit', compact('inventory'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'stok'        => 'required|numeric',
            'harga_beli'  => 'required|numeric',
            'harga_jual'  => 'required|numeric',
        ]);

        DB::table('inventories')->where('id', $id)->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'deskripsi'   => $request->deskripsi,
            'stok'        => $request->stok,
            'harga_beli'  => $request->harga_beli,
            'harga_jual'  => $request->harga_jual,
            'updated_at'  => now(),
        ]);
        return redirect()->route('inventory.index')->with('success', 'Barang berhasil diupdate!');
    }

    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return redirect()->route('inventory.index')->with('success', 'Barang berhasil dihapus!');
    }
}