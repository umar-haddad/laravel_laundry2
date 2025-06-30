<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeOfServices extends Model
{
    protected $table = 'type_of_service' ;
    protected $fillable = ['service_name', 'price', 'description'];
}
