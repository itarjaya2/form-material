<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model
{
    //
    protected $fillable = [
    'no_do',
    'ekspedisi',
    'no_polisi',
    'barang',
    'catatan',
];
}
