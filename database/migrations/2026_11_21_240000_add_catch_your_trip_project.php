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
            ['slug' => 'catch-your-trip-platform'],
            [
                'portfolio_category_id' => $cat->id,
                'title' => 'Catch Your Trip - Global Travel & Tour Booking Platform',
                'image' => 'assets/images/portfolio/catchyourtrip.jpg',
                'client' => 'Catch Your Trip Travel Agency',
                'year' => '2026',
                'services_provided' => 'Website Design & Development, Brand Identity (Logo, Colors, Fonts), Multilingual Data Creation',
                'overview' => 'Full-scale digital architecture, booking ecosystem, and modern brand identity formulation for Catch Your Trip — an international travel agency delivering curated cultural expeditions, Red Sea marine excursions, desert safaris, and historical tours across Egypt.',
                'challenges' => 'Catch Your Trip required an intuitive, high-converting digital storefront capable of managing dynamic excursion catalogs, providing fast multi-language mobile reservations for global tourists, and conveying authentic travel expertise.',
                'solution' => 'Engineered an ultra-fast web booking portal with categorized excursion listings, interactive itinerary galleries, and instant inquiry checkout funnels. Formulated a vibrant brand identity with oceanic and sky-blue color palettes, modern typography, and comprehensive multilingual travel content.',
                'results' => 'Achieved rapid direct tour bookings, sub-second page loads across mobile devices, and high search visibility for popular Egyptian travel experiences.',
                'live_url' => 'https://catchyour-trip.com/en/',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 2,
                'is_active' => true,
            ]
        );
    }

    public function down(): void
    {
        PortfolioProject::where('slug', 'catch-your-trip-platform')->delete();
    }
};
