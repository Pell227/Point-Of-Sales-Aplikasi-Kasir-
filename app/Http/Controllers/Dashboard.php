<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Staff;
use App\Models\Supplier;
use App\Models\transactions;
use App\Models\transactionList;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        $totalProduk      = Product::count();
        $totalStaff       = Staff::count();
        $totalSupplier    = Supplier::count();
        $transaksiHariIni = transactions::whereDate('datetrans', today())->count();
        $revenueHariIni   = transactions::whereDate('datetrans', today())->sum('amount');
        $transaksiTerbaru = transactions::orderBy('created_at', 'desc')->take(5)->get();

        return view('dashboard', compact(
            'totalProduk',
            'totalStaff',
            'totalSupplier',
            'transaksiHariIni',
            'revenueHariIni',
            'transaksiTerbaru'
        ));
    }
}