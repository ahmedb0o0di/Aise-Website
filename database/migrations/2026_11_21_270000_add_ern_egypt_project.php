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
            ['slug' => 'ern-egypt-platform'],
            [
                'portfolio_category_id' => $cat->id,
                'title' => 'Elite Resources Network (ERN) - Shared Services & Digital Platform',
                'image' => 'assets/images/portfolio/ernegypt.jpg',
                'client' => 'Elite Resources Network (ERN - Egypt)',
                'year' => '2026',
                'services_provided' => 'Web Design & Development, Corporate Digital Architecture, IT Solutions Platform',
                'overview' => 'Comprehensive corporate web design and digital architecture for Elite Resources Network (ERN) — Egypt\'s premier shared service center in Hurghada, delivering end-to-end IT services, software development, RPA automation, yield management, and corporate business solutions.',
                'challenges' => 'ERN needed a sophisticated, enterprise-grade digital web platform that presents their extensive IT and shared service capabilities to international partners while maintaining ultra-fast response times and high conversion for corporate inquiries.',
                'solution' => 'Architected and developed a modern, high-performance web platform featuring tailored service showcase modules, streamlined recruitment and corporate partner contact funnels, and responsive cross-device layout standards.',
                'results' => 'Delivered an authoritative corporate web presence, boosted qualified international partner leads, and established high-speed digital infrastructure reflecting ERN\'s standing as a leading technology provider.',
                'live_url' => 'https://ern-egypt.com/',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 5,
                'is_active' => true,
            ]
        );
    }

    public function down(): void
    {
        PortfolioProject::where('slug', 'ern-egypt-platform')->delete();
    }
};
