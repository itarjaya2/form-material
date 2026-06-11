<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kertas extends Model
{
    //
    protected $fillable = [
        'kode',
        'nama',
        'jenis',
        'gramasi',
        'material',
        'panjang',
        'lebar',
        'spesifikasi',
    ];
}
