<?php

use App\Models\PortfolioCategory;
use App\Models\PortfolioProject;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $cat = PortfolioCategory::where('slug', 'branding')->first()
            ?? PortfolioCategory::firstOrCreate(['slug' => 'branding'], ['name' => 'Brand Identity & Strategy', 'sort_order' => 1]);

        PortfolioProject::updateOrCreate(
            ['slug' => 'almasa-construction-platform'],
            [
                'portfolio_category_id' => $cat->id,
                'title' => 'Al Masa Construction - Architectural Contracting & Digital Identity',
                'image' => 'assets/images/portfolio/almasa.jpg',
                'client' => 'Al Masa Trading & Contracting',
                'year' => '2026',
                'services_provided' => 'Brand Identity, Digital Corporate Architecture, Architectural Project Showcase',
                'overview' => 'Comprehensive corporate brand identity and bespoke web platform engineering for Al Masa Construction (Al Masa Trading & Contracting) — a premier civil engineering, commercial construction, and high-end architectural finishing firm delivering mega-scale infrastructure projects across Egypt.',
                'challenges' => 'Al Masa needed an authoritative corporate brand presence and high-performance digital portfolio to display massive infrastructure and commercial developments, communicate certified engineering standards, and attract institutional partners.',
                'solution' => 'Engineered a sophisticated, mobile-optimized corporate portal with categorized construction portfolios, high-resolution project galleries, tender inquiry workflows, and refined visual identity guidelines.',
                'results' => 'Elevated market perception across the MENA contracting sector, improved corporate tender presentation, and established a scalable digital showcase for landmark commercial and residential developments.',
                'live_url' => 'https://almasa-ta.com/',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 9,
                'is_active' => true,
            ]
        );
    }

    public function down(): void
    {
        PortfolioProject::where('slug', 'almasa-construction-platform')->delete();
    }
};
