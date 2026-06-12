<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $fillable = [
        'code',
        'item',
        'material',
        'specs',
        'panjang',
        'lebar',
        'tinggi',
        'qty',
        'unit'
    ];
}
