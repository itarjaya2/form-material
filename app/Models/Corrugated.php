<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Corrugated extends Model
{
    protected $fillable = [
        'code',
        'item',    
        'jenis',       
        'material',
        'gramasi',     
        'panjang',     
        'lebar',    
        'specs',
        'qty',
        'unit',
    ];
}
