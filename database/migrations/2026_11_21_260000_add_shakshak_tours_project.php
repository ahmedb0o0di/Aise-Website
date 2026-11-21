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
            ['slug' => 'shakshak-tours-platform'],
            [
                'portfolio_category_id' => $cat->id,
                'title' => 'Shakshak Tours - German Excursions & Booking Portal',
                'image' => 'assets/images/portfolio/shakshak.jpg',
                'client' => 'Shakshak Tours Hurghada',
                'year' => '2026',
                'services_provided' => 'Website Design & Development, Multilingual Content Architecture, Booking System Integration',
                'overview' => 'Comprehensive web design and digital platform development for Shakshak Tours — Hurghada\'s leading specialized German-language excursion provider, delivering premium snorkeling cruises, desert quad safaris, Luxor and Cairo cultural expeditions, and private transfers.',
                'challenges' => 'Shakshak Tours needed a high-performance, German-focused excursion portal offering seamless multi-device booking, transparent pricing, and instant communication channels for German-speaking travelers visiting the Red Sea.',
                'solution' => 'Engineered a bespoke, responsive web portal with categorized excursion guides, clear itinerary schedules, and integrated direct inquiry pipelines. Built high-speed mobile architecture optimized for holidaymakers browsing on local resort connections.',
                'results' => 'Achieved rapid online inquiry growth, sub-second page performance across mobile devices, and high search visibility for German-language Hurghada excursion searches.',
                'live_url' => 'https://shakshaktours.com/en/',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 4,
                'is_active' => true,
            ]
        );
    }

    public function down(): void
    {
        PortfolioProject::where('slug', 'shakshak-tours-platform')->delete();
    }
};
