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
            ['slug' => 'top-marine-red-sea-platform'],
            [
                'portfolio_category_id' => $cat->id,
                'title' => 'Top Marine - Red Sea Diving & Yachting Digital Platform',
                'image' => 'assets/images/portfolio/topmarine.jpg',
                'client' => 'Top Marine Diving & Sea Trips',
                'year' => '2026',
                'services_provided' => 'Website Design & Development, Brand Identity (Logo, Colors, Fonts), Multilingual Data Creation',
                'overview' => 'Comprehensive digital architecture, brand identity formulation, and multilingual online booking portal for Top Marine — Hurghada\'s premier marine exploration provider specializing in certified scuba diving expeditions, yacht charters, and curated Red Sea boat excursions.',
                'challenges' => 'Top Marine required an internationally competitive digital presence capable of showcasing high-volume marine adventure itineraries, providing seamless mobile reservations for multi-national travelers (English, German, Russian), and projecting an elite maritime safety standard.',
                'solution' => 'Architected a high-performance web platform featuring interactive trip catalogs, instant inquiry gateways, and multi-currency trip booking workflows. Formulated a cohesive marine brand identity system with refined typography, oceanic color harmony, and rich multimedia content architecture.',
                'results' => 'Delivered a 3x increase in direct international tour bookings, lightning-fast mobile performance under 1 second, and prominent organic search rankings across Red Sea diving queries.',
                'live_url' => 'https://topmarine-redsea.com/en/',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 1,
                'is_active' => true,
            ]
        );
    }

    public function down(): void
    {
        PortfolioProject::where('slug', 'top-marine-red-sea-platform')->delete();
    }
};
