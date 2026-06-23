<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactionList extends Model
{
    use HasFactory;

    public function transaction()
    {
        return $this->belongsTo(transactions::class, 'Transactionid', 'Transactionid');
    }

    protected $table = 'transaction_lists';

    protected $fillable = [
        'Transactionid',
        'Receiptid',
        'Cashier_id',
        'Cashier_name',
        'Store_id',
        'Description',
        'Quantity',
        'Total',
    ];
}
