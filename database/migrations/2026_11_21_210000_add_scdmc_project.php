<?php

use App\Models\PortfolioCategory;
use App\Models\PortfolioProject;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $cat = PortfolioCategory::where('slug', 'web')->first()
            ?? PortfolioCategory::firstOrCreate(['slug' => 'web'], ['name' => 'Web Design', 'sort_order' => 4]);

        PortfolioProject::updateOrCreate(
            ['slug' => 'sc-dmc-global-travel-platform'],
            [
                'portfolio_category_id' => $cat->id,
                'title' => 'SC DMC (Scandia) - Global Travel Platform & Brand Identity',
                'image' => 'assets/images/portfolio/scdmc.jpg',
                'client' => 'SC DMC (Scandia Travel Group)',
                'year' => '2026',
                'services_provided' => 'Website Design & Development, Company Identity (Logo, Colors, Fonts), Data Creation',
                'overview' => 'Full-spectrum digital architecture, multilingual data creation, and corporate brand identity for SC DMC (Scandia) — a premier global Destination Management Company delivering ground handling, contracting, and curated travel experiences for international tour operators and travel agencies.',
                'challenges' => 'Establishing a distinguished Scandinavian brand presence with a high-performance web platform, presenting comprehensive international destination inventories, and providing seamless corporate communication across multiple global markets.',
                'solution' => 'Engineered an ultra-fast, responsive web portal with intuitive destination showcases and booking inquiry pipelines. Formulated a cohesive corporate brand identity including custom logo design, color harmony, typography standards, and complete structured data creation.',
                'results' => 'Launched an enterprise-class global travel hub with sub-second loading speeds, exceptional mobile responsiveness, and an authoritative visual identity reinforcing international trade confidence.',
                'live_url' => 'https://www.scdmc.com/en/',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 0,
                'is_active' => true,
            ]
        );
    }

    public function down(): void
    {
        PortfolioProject::where('slug', 'sc-dmc-global-travel-platform')->delete();
    }
};
