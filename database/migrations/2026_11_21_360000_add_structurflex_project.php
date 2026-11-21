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
            ['slug' => 'structurflex-contracting-platform'],
            [
                'portfolio_category_id' => $cat->id,
                'title' => 'Structurflex Middle East - Tensile Architecture & Air Domes Platform',
                'image' => 'assets/images/portfolio/structurflex.jpg',
                'client' => 'Structurflex Middle East Contracting LLC',
                'year' => '2026',
                'services_provided' => 'Web Design & Development, Engineering Project Architecture, Tensile Membrane Showcase',
                'overview' => 'Enterprise digital platform and architectural engineering showcase for Structurflex Middle East Contracting LLC — industry pioneers in tensile membrane structures (PTFE, ETFE, PVC) and ASATI air-supported domes for stadiums, transportation hubs, and iconic landmarks across the UAE and GCC.',
                'challenges' => 'Structurflex required an authoritative digital portal to display complex engineering mega-projects, detailed material specifications, and certified structural capabilities to GCC government ministries, tier-1 architects, and EPC contractors.',
                'solution' => 'Architected a high-performance web platform featuring categorized structural engineering project galleries, downloadable technical datasheets, interactive RFP pipelines, and mobile-responsive layout architecture.',
                'results' => 'Elevated market authority across the GCC construction sector, increased high-value project inquiries from UAE infrastructure tenders, and provided an interactive digital showcase for landmark tensile structures.',
                'live_url' => 'https://structurflex.ae/',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 14,
                'is_active' => true,
            ]
        );
    }

    public function down(): void
    {
        PortfolioProject::where('slug', 'structurflex-contracting-platform')->delete();
    }
};
