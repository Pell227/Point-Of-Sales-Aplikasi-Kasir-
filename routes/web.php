<?php

use App\Models\Product;
use Illuminate\Http\Request;

Route::get('/products', function () {
    $products = Product::all();
    return view('products', compact('products'));
});

Route::post('/products', function (Request $request) {

    Product::create([
        'name' => $request->name,
        'stock' => $request->stock,
        'price' => $request->price,
    ]);

    return redirect('/products');
});