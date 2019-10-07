<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    //
    protected $fillable = ['name', 'street', 'streetNumber', 'neighborhood'];
}
