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
            ['slug' => 'power-factor-solutions-platform'],
            [
                'portfolio_category_id' => $cat->id,
                'title' => 'Power Factor Solutions - Industrial Construction & Energy Platform',
                'image' => 'assets/images/portfolio/powerfactor.jpg',
                'client' => 'Power Factor Solutions for Construction',
                'year' => '2026',
                'services_provided' => 'Brand Identity, Digital Corporate Architecture, Engineering Project Showcase',
                'overview' => 'Comprehensive brand identity engineering and corporate digital portal for Power Factor Solutions — an Egyptian construction and electro-mechanical engineering firm delivering industrial roofing, power factor correction systems, electrical transmission towers, solar infrastructure, and civil contracting.',
                'challenges' => 'Power Factor needed a professional, modernized corporate identity and digital presence to present multi-disciplinary engineering services, attract commercial developers, and showcase complex infrastructural case studies.',
                'solution' => 'Engineered a responsive, high-speed corporate web platform featuring interactive engineering service portfolios, technical capability guides, tender inquiry pipelines, and unified corporate identity collateral.',
                'results' => 'Expanded corporate client outreach across energy and construction sectors, increased direct contract inquiries, and established a modern, authoritative industry presence.',
                'live_url' => 'https://powerfactor-solutions.com/',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 11,
                'is_active' => true,
            ]
        );
    }

    public function down(): void
    {
        PortfolioProject::where('slug', 'power-factor-solutions-platform')->delete();
    }
};
