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
            ['slug' => 'tijan-modest-fashion-platform'],
            [
                'portfolio_category_id' => $cat->id,
                'title' => 'TIJAN Modest Fashion - E-Commerce & Social Media Growth Engine',
                'image' => 'assets/images/portfolio/tijanfashion.jpg',
                'client' => 'TIJAN Modest Fashion Egypt',
                'year' => '2026',
                'services_provided' => 'Social Media Management, Performance Marketing, E-Commerce Platform Architecture',
                'overview' => 'End-to-end e-commerce store architecture, viral social media creative direction, and performance marketing for TIJAN — Egypt\'s premier modest fashion and basics label for modern hijabi women, delivering bespoke denim, chic sets, dresses, and wardrobe staples across the country.',
                'challenges' => 'TIJAN needed a high-converting digital storefront paired with an always-on, aesthetically refined social media presence to scale online order volumes, minimize sizing inquiries, and handle high-volume flash sales on mobile traffic.',
                'solution' => 'Architected a high-speed, mobile-first e-commerce shopping experience with instant WhatsApp customer support integration, visual sizing guides, and automated inventory sync. Orchestrated high-engagement social media content calendars and viral creator-led campaigns across Instagram and TikTok.',
                'results' => 'Achieved 3.8x ROAS on paid social campaigns, grew active Instagram community engagement, and reduced cart abandonment rates while fulfilling thousands of nationwide cash-on-delivery orders.',
                'live_url' => 'https://tijanfashion.com/en',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 12,
                'is_active' => true,
            ]
        );
    }

    public function down(): void
    {
        PortfolioProject::where('slug', 'tijan-modest-fashion-platform')->delete();
    }
};
