<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BahanPenolong extends Model
{
    //
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
