<?php

use App\Models\PortfolioCategory;
use App\Models\PortfolioProject;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $cat = PortfolioCategory::where('slug', 'social')->first()
            ?? PortfolioCategory::firstOrCreate(['slug' => 'social'], ['name' => 'Social Media Management', 'sort_order' => 2]);

        PortfolioProject::updateOrCreate(
            ['slug' => 'project-lifestyle-community-platform'],
            [
                'portfolio_category_id' => $cat->id,
                'title' => 'Project Lifestyle - Private Community & Life Coaching Platform',
                'image' => 'assets/images/portfolio/projectlifestyle.jpg',
                'client' => 'Project Lifestyle Netherlands (Evelinn Damstra)',
                'year' => '2026',
                'services_provided' => 'Private Social Network Engineering, Web Design & Development, Life Coaching Community Architecture',
                'overview' => 'Bespoke private social media network and interactive life coaching platform for Project Lifestyle — the Netherlands\' premier sustainable health transformation initiative founded by Evelinn Damstra, empowering thousands to achieve lasting weight loss, mental resilience, and vibrant lifestyle habits without restrictive dieting.',
                'challenges' => 'Project Lifestyle needed an exclusive, distraction-free private social network to replace fragmented third-party groups, safeguard member privacy, enable interactive habit-tracking feeds, host structured coaching modules, and foster daily peer motivation across web and mobile.',
                'solution' => 'Architected a high-speed progressive web application (PWA) with real-time community feeds, private member profiles, multimedia coaching libraries, interactive habit milestone celebrations, and push notification engagement.',
                'results' => 'Cultivated an intensely engaged, safe community of members sharing daily triumphs, boosted long-term coaching retention, and established an independent digital home for the Project Lifestyle movement.',
                'live_url' => 'https://community.projectlifestyle.nl/',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 17,
                'is_active' => true,
            ]
        );
    }

    public function down(): void
    {
        PortfolioProject::where('slug', 'project-lifestyle-community-platform')->delete();
    }
};
