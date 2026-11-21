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

    public function getImageUrlAttribute(): string
    {
        if (empty($this->image)) {
            return asset('assets/images/bg/promo.jpg');
        }

        if (str_starts_with($this->image, 'http') || str_starts_with($this->image, 'assets/')) {
            return asset($this->image);
        }

        return asset('storage/' . $this->image);
    }
}
