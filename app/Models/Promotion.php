<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public function index()
    {
        $promotions = Promotion::all();

        return view('promotions.index', compact('promotions'));
    }
}
