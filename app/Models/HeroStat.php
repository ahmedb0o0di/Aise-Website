<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroStat extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
