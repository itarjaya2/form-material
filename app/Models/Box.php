<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $fillable = [
        'kode',
        'nama',
        'jenis',
        'material',
        'panjang',
        'lebar',
        'tinggi',
        'spesifikasi',
    ];
}
