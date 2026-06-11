<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Corrugated extends Model
{
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
