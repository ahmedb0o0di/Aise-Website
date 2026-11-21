<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PortfolioProject extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'card_height' => 'integer',
        'sort_order' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(PortfolioCategory::class, 'portfolio_category_id');
    }

    public function getFilterCategoriesAttribute(): string
    {
        if (in_array($this->slug, ['sc-dmc-global-travel-platform', 'top-marine-red-sea-platform'])) {
            return 'branding web';
        }

        return $this->category->slug ?? 'all';
    }

    public function getCategoryDisplayNameAttribute(): string
    {
        if (in_array($this->slug, ['sc-dmc-global-travel-platform', 'top-marine-red-sea-platform'])) {
            return 'Branding & Web Design';
        }

        return $this->category->name ?? 'Project';
    }
}
