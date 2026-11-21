<?php

use App\Models\PortfolioCategory;
use App\Models\PortfolioProject;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $cat = PortfolioCategory::where('slug', 'web')->first()
            ?? PortfolioCategory::firstOrCreate(['slug' => 'web'], ['name' => 'Web Design & Development', 'sort_order' => 1]);

        PortfolioProject::updateOrCreate(
            ['slug' => 'zoofood-pet-nutrition-platform'],
            [
                'portfolio_category_id' => $cat->id,
                'title' => 'ZooFood - Pet Nutrition & E-Commerce Delivery Platform',
                'image' => 'assets/images/portfolio/zoofood.jpg',
                'client' => 'ZooFood Pet Supplies Hurghada',
                'year' => '2026',
                'services_provided' => 'Web Design & Development, E-Commerce Store Architecture, Fast Logistics Integration',
                'overview' => 'Full-scale e-commerce store architecture and digital delivery platform for ZooFood — the Red Sea\'s premier pet food and veterinary supplies destination based in Hurghada, offering 100+ top international nutrition brands and ultra-fast 45-minute local doorstep delivery.',
                'challenges' => 'ZooFood required an intuitive, lightning-fast digital storefront capable of categorizing thousands of pet food formulas (by pet age, breed size, and dietary restrictions), handling high-volume online orders, and providing frictionless mobile checkout with WhatsApp customer support.',
                'solution' => 'Architected a high-performance e-commerce web platform featuring categorized pet nutrition catalogs (dogs, cats, birds, rodents, fish), fast cart & checkout flows, real-time WhatsApp inquiry integration, and optimized mobile loading speeds.',
                'results' => 'Boosted daily online direct orders, streamlined 45-minute local delivery operations across Hurghada, and expanded brand trust with both local pet owners and international expatriates.',
                'live_url' => 'https://zoofood.online/',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 15,
                'is_active' => true,
            ]
        );
    }

    public function down(): void
    {
        PortfolioProject::where('slug', 'zoofood-pet-nutrition-platform')->delete();
    }
};
