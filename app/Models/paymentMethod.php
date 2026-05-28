<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods';

    protected $fillable = [
        'payment_method',
        'payment_type',
        'payment_category',
        'provider'
    ];
}