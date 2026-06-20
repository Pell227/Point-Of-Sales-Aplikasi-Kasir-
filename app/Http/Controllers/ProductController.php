<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('Product.index', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|numeric'
        ]);

        $product = Product::create($request->all());

        return response()->json([
            'message' => 'Product berhasil ditambahkan',
            'data' => $product
        ]);
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|numeric'
        ]);

        $product->update($request->all());

        return response()->json([
            'message' => 'Product berhasil diupdate',
            'data' => $product
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'message' => 'Product berhasil dihapus'
        ]);
    }

    public function create()
    {
        return view('Product.create');
    }

    public function edit(Product $product)
    {
        return view('Product.edit', compact('product'));
    }
}