<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tinta extends Model
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
