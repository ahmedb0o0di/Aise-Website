<?php

use App\Models\PortfolioCategory;
use App\Models\PortfolioProject;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $cat = PortfolioCategory::where('slug', 'social')->first()
            ?? PortfolioCategory::firstOrCreate(['slug' => 'social'], ['name' => 'Social Media Management', 'sort_order' => 2]);

        PortfolioProject::updateOrCreate(
            ['slug' => 'noush-cosmetics-platform'],
            [
                'portfolio_category_id' => $cat->id,
                'title' => 'Noush Cosmetics - Natural Baby Care E-Commerce & Social Hub',
                'image' => 'assets/images/portfolio/noush.jpg',
                'client' => 'Noush Cosmetics Egypt',
                'year' => '2026',
                'services_provided' => 'Social Media Management, Creative Content Production, E-Commerce Platform Architecture',
                'overview' => 'Digital e-commerce architecture, brand positioning, and social community growth for Noush Cosmetics — an Egyptian premium baby and family personal care label creating natural, dermatologist-tested baby washes, diaper rash creams, detanglers, and pure baby oils.',
                'challenges' => 'Noush needed a warm, trustworthy digital storefront that reassures mothers, simplifies bundle shopping, and drives viral parenting community engagement across Instagram and TikTok.',
                'solution' => 'Engineered a clean, pastel-themed mobile shopping portal with one-click bundle builders, educational parenting guides, ingredient transparency spotlights, and integrated influencer marketing funnels.',
                'results' => 'Generated 4.2x ROAS across social media ad channels, established an active community of 45K+ engaged mothers, and streamlined direct-to-consumer fulfillment nationwide.',
                'live_url' => 'https://noushcosmetics.com/',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 13,
                'is_active' => true,
            ]
        );
    }

    public function down(): void
    {
        PortfolioProject::where('slug', 'noush-cosmetics-platform')->delete();
    }
};
