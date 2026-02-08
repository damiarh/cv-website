<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $fillable = [
        'title',
        'issuer',
        'date_received',
        'description',
    ];

    protected $casts = [
        'date_received' => 'date',
    ];
}