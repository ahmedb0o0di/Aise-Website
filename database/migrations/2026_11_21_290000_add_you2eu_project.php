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
            ['slug' => 'you2eu-platform'],
            [
                'portfolio_category_id' => $cat->id,
                'title' => 'You2EU - German Language & Career Pathway Platform',
                'image' => 'assets/images/portfolio/you2eu.jpg',
                'client' => 'You2EU Education & Visa Services',
                'year' => '2026',
                'services_provided' => 'Web Design & Development, Course Enrollment Portal, Educational Content Architecture',
                'overview' => 'Comprehensive digital educational platform and course enrollment portal for You2EU — specialized German language academy offering online and offline courses, exam preparation (Goethe, telc), and complete end-to-end guidance for studying and working in Germany.',
                'challenges' => 'You2EU required a modern, trustworthy digital portal to manage course schedules, simplify student onboarding, showcase German career pathways, and handle international inquiry pipelines seamlessly.',
                'solution' => 'Engineered an intuitive, high-speed web application with interactive course catalogs, level assessments, student support integrations, and streamlined consultation funnels across mobile and desktop.',
                'results' => 'Significant boost in monthly course enrollments, rapid page performance for students in Egypt and Germany, and enhanced institutional credibility for international visa candidates.',
                'live_url' => 'https://you2eu.com/en/',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 7,
                'is_active' => true,
            ]
        );
    }

    public function down(): void
    {
        PortfolioProject::where('slug', 'you2eu-platform')->delete();
    }
};
