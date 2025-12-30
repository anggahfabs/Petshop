<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
    //class Service extends Model
{
    protected $fillable = [
        'image',
        'caption',
        'is_active',
    ];
}

