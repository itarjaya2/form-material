<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kertas extends Model
{
    //
    protected $fillable = [
        'code',
        'item',    
        'jenis',       
        'material',    
        'bentuk', 
        'gramasi',     
        'panjang',     
        'lebar',    
        'specs',
        'qty',
        'unit'
    ];
}
