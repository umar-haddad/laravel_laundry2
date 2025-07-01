<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransOrderDetail extends Model
{
    protected $fillable = [
        'id_trans',
        'id_service',
        'qty',
        'subtotal',
        'notes'
    ];
}
