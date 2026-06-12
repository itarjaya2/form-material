<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chemical extends Model
{
    protected $fillable = [
        'code',
        'item',
        'material',
        'specs',
        'qty',
        'unit'
    ];
}
