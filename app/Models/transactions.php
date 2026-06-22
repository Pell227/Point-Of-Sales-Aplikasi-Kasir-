<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    public function transactionLists()
    {
        return $this->hasMany(transactionList::class, 'Transactionid', 'Transactionid');
    }

    protected $table = 'transactions';

    protected $fillable = [
        'Transactionid',
        'nameTransaction',
        'amount',
        'tax',
        'statustrans',
        'datetrans',
    ];
}
