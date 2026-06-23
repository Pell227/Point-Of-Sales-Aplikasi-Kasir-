<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'promo_name',
        'discount_type',
        'discount_value',
        'min_purchase',
        'start_date',
        'end_date',
        'is_active'
    ];
}