<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'id',
        'name',
        'amount',
        'tax',
        'status',
        'date',
    ];
}
