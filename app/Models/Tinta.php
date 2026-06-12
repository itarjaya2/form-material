<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tinta extends Model
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
