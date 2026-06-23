<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index() {
    $totalProduk = Product::count();
    $totalStaff = Staff::count();
    $totalSupplier = Supplier::count();
    $transaksiHariIni = Transaction::whereDate('created_at', today())->count();
    $revenueHariIni = Transaction::whereDate('created_at', today())->sum('amount');

    return view('dashboard', compact('totalProduk', 'totalStaff', 'totalSupplier', 'transaksiHariIni', 'revenueHariIni'));
}
}
