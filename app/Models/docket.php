<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class docket extends Model
{
    //
    protected $guarded = [
    'id',
    'edited_by',
    'created_at',
    'updated_at',
];
    
    
}
