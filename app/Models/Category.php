<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'id',
        'nameK',
        'status',
        'date',
        'description',
    ];

    protected $keyType = 'string';
    public $incrementing = false;
}
