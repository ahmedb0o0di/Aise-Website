<?php

use App\Models\PortfolioCategory;
use App\Models\PortfolioProject;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $cat = PortfolioCategory::where('slug', 'web')->first()
            ?? PortfolioCategory::firstOrCreate(['slug' => 'web'], ['name' => 'Web Design & Development', 'sort_order' => 4]);

        PortfolioProject::updateOrCreate(
            ['slug' => 'tourlives-travel-platform'],
            [
                'portfolio_category_id' => $cat->id,
                'title' => 'TourLives Travel - Red Sea Excursions & Day Tours Portal',
                'image' => 'assets/images/portfolio/tourlives.jpg',
                'client' => 'TourLives Travel Egypt',
                'year' => '2026',
                'services_provided' => 'Website Design & Development, Multilingual Excursion Booking Engine, High-Speed Mobile Architecture',
                'overview' => 'End-to-end web design and digital portal engineering for TourLives Travel — Hurghada\'s premier excursion and Red Sea tour operator, delivering curated boat cruises, desert quad safaris, private transfers, and cultural day trips across Egypt.',
                'challenges' => 'TourLives needed an intuitive, multilingual booking portal capable of handling high seasonal tourist traffic with instant booking confirmations, flexible group reservations, and lightning-fast mobile loading on international roaming networks.',
                'solution' => 'Developed a modern, responsive web application with structured excursion categorization, real-time availability inquiries, transparent pricing, and instant communication channels for global holidaymakers.',
                'results' => 'Achieved 60%+ increase in direct digital booking inquiries, sub-second mobile page loads, and seamless multi-device browsing for international travelers.',
                'live_url' => 'https://beta.tourlives.com/en/',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 6,
                'is_active' => true,
            ]
        );
    }

    public function down(): void
    {
        PortfolioProject::where('slug', 'tourlives-travel-platform')->delete();
    }
};
