<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    protected $casts = [
        'tags' => 'array',
        'included_features' => 'array',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
