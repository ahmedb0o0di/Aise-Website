<?php

use App\Models\PortfolioCategory;
use App\Models\PortfolioProject;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $cat = PortfolioCategory::where('slug', 'branding')->first()
            ?? PortfolioCategory::firstOrCreate(['slug' => 'branding'], ['name' => 'Branding', 'sort_order' => 1]);

        PortfolioProject::updateOrCreate(
            ['slug' => 'caregate-group-platform'],
            [
                'portfolio_category_id' => $cat->id,
                'title' => 'Care Gate Group - Medical Devices, Healthcare & Enterprise ERP Portal',
                'image' => 'assets/images/portfolio/caregate.jpg',
                'client' => 'Care Gate Group (Care Gate for Medical Supplies & Devices)',
                'year' => '2026',
                'services_provided' => 'Brand Identity, Web Design & Development, Enterprise Medical ERP Platform',
                'overview' => 'Comprehensive brand identity systems, modern digital web architecture, and enterprise healthcare ERP platform for Care Gate Group — leading provider of clinical medical equipment, home healthcare devices, maternal & infant wellness solutions, and institutional healthcare supply chain management across Egypt and the Middle East.',
                'challenges' => 'Care Gate required a unified brand identity, multi-tiered enterprise ERP management for medical equipment batches, compliance-grade inventory serialization, and an ultra-modern digital portal serving both B2B clinical healthcare institutions and direct home patients.',
                'solution' => 'Delivered complete visual identity guidelines, modern Arabic & English corporate web architecture with high-speed medical equipment catalogs, and integrated enterprise ERP modules managing inventory, sales pipelines, warranty tracking, and regulatory certifications.',
                'results' => 'Streamlined clinical medical equipment distribution, enhanced institutional brand trust among hospitals and healthcare providers, and scaled automated ERP supply chain operations with 99.9% uptime.',
                'live_url' => 'https://www.caregategroup.com/',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 16,
                'is_active' => true,
            ]
        );
    }

    public function down(): void
    {
        PortfolioProject::where('slug', 'caregate-group-platform')->delete();
    }
};
