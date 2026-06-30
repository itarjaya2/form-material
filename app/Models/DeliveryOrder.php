<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model
{
    //
    protected $fillable = [
    'code',
    'ekspedisi',
    'no_polisi',
    'barang',
    'catatan',
];
}
