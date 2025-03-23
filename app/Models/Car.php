<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'position', 'lang',
        'number', 'model',
        'registered_at',
    ];

    protected $casts = [
        'registered_at' => 'datetime:d.m.y H:i',
    ];
}
