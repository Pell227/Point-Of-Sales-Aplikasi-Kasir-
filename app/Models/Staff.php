<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{

    protected $table = 'staff';

    protected $fillable = [
        'NIP',
        'name',
        'position',
        'email',
        'phone_number',
    ];
}
