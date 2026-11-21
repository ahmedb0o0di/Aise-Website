<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $guarded = [];

    protected $casts = [
        'rating' => 'float',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
