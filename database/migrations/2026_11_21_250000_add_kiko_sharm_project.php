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
            ['slug' => 'kiko-sharm-platform'],
            [
                'portfolio_category_id' => $cat->id,
                'title' => 'Kiko Sharm - Excursions & Tour Booking Platform',
                'image' => 'assets/images/portfolio/kikosharm.jpg',
                'client' => 'Kiko Sharm Tours & Excursions',
                'year' => '2026',
                'services_provided' => 'Website Design & Development, Brand Identity (Logo, Colors, Fonts), Multilingual Data Creation',
                'overview' => 'Comprehensive digital architecture, tour reservation engine, and vibrant brand identity formulation for Kiko Sharm — a leading excursion operator in Sharm El Sheikh specializing in Sinai desert safaris, quad biking, Ras Mohammad & Tiran Island sea voyages, and historical cultural tours across Egypt.',
                'challenges' => 'Kiko Sharm needed a dynamic, highly responsive booking platform to cater to international European and global tourists, providing effortless excursion discovery, clear multilingual itineraries, and instantaneous booking communication.',
                'solution' => 'Engineered a lightweight, mobile-first web reservation platform featuring detailed activity schedules, instant WhatsApp & online inquiry funnels, and interactive photo galleries. Developed an energetic sunny brand identity with warm Sinai golden tones and sea-blue accents.',
                'results' => 'Boosted direct digital customer inquiries by over 180%, established sub-second mobile page loading for resort visitors, and consolidated local market authority in Sharm El Sheikh excursion bookings.',
                'live_url' => 'https://kiko-sharm.com/',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 3,
                'is_active' => true,
            ]
        );
    }

    public function down(): void
    {
        PortfolioProject::where('slug', 'kiko-sharm-platform')->delete();
    }
};
