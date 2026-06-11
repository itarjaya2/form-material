<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'nama',
        'jenis',
        'material',
        'panjang',
        'lebar',
        'tinggi',
        'spesifikasi',
    ];
}