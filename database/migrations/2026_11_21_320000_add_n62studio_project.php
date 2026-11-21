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
            ['slug' => 'n62-creative-studio-platform'],
            [
                'portfolio_category_id' => $cat->id,
                'title' => 'N62 Studio - Creative Production & Agency Platform',
                'image' => 'assets/images/portfolio/n62studio.jpg',
                'client' => 'N62 Creative Studio Abu Dhabi',
                'year' => '2026',
                'services_provided' => 'Web Design & Development, Creative Portfolio Architecture, Interactive Media Showcase',
                'overview' => 'Bespoke digital platform engineering and portfolio architecture for N62 Studio — an Abu Dhabi-born creative powerhouse uniting brand strategy, creative direction, film production, post-production, and digital marketing for global brands including Porsche, Adidas, and cultural institutions.',
                'challenges' => 'N62 required an ultra-sleek, avant-garde web presence that reflects their high-fashion visual standards, renders heavy multimedia and 4K showreels smoothly, and drives international commercial inquiries from UAE and global enterprises.',
                'solution' => 'Engineered an ultra-fast, minimalist web experience with fluid typography, responsive video integrations, categorized project case studies, and modern interactive micro-animations.',
                'results' => 'Positioned N62 as an elite creative studio in the Gulf region, delivered sub-second load times for media-rich project reels, and boosted inbound luxury brand partnerships.',
                'live_url' => 'https://n62studio.com/',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 10,
                'is_active' => true,
            ]
        );
    }

    public function down(): void
    {
        PortfolioProject::where('slug', 'n62-creative-studio-platform')->delete();
    }
};
