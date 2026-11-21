<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $guarded = [];

    public static function getSettings(): self
    {
        return static::firstOrCreate(['id' => 1]);
    }

    public function getAboutImageUrlAttribute(): string
    {
        if (empty($this->about_image)) {
            return asset('assets/images/about/about-img.jpg');
        }

        if (str_starts_with($this->about_image, 'http') || str_starts_with($this->about_image, 'assets/')) {
            return asset($this->about_image);
        }

        return asset('storage/' . $this->about_image);
    }

    public function getHeroImageUrlAttribute(): string
    {
        if (empty($this->hero_image)) {
            return asset('assets/img/hero-bg.jpg');
        }

        if (str_starts_with($this->hero_image, 'http') || str_starts_with($this->hero_image, 'assets/')) {
            return asset($this->hero_image);
        }

        return asset('storage/' . $this->hero_image);
    }
}
