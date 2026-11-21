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
            ['slug' => 'robota-industries-platform'],
            [
                'portfolio_category_id' => $cat->id,
                'title' => 'Robota Industries - Advanced 3D Printers & CNC Machinery Platform',
                'image' => 'assets/images/portfolio/robota.jpg',
                'client' => 'Robota Industries LLC',
                'year' => '2026',
                'services_provided' => 'Web Design & Development, Industrial Machinery Catalog, Technical B2B Architecture',
                'overview' => 'Enterprise digital platform and industrial equipment showcase for Robota Industries — leading manufacturer and distributor of high-precision CNC routers, industrial 3D printers, CO2 laser cutting machinery, and precision lathes serving industrial, educational, and medical manufacturing sectors for over 14 years.',
                'challenges' => 'Robota Industries required a robust, modern industrial web presence to showcase complex engineering equipment, provide detailed technical specifications and brochures, and facilitate direct enterprise B2B sales inquiries.',
                'solution' => 'Architected a high-performance, responsive machinery catalog featuring categorized product specifications, downloadable engineering datasheets, interactive quote request workflows, and multilingual readiness.',
                'results' => 'Increased international B2B inquiries by over 45%, streamlined technical brochure distribution, and reinforced Robota\'s reputation as a top-tier industrial machinery innovator.',
                'live_url' => 'https://robota-industries.com/',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 8,
                'is_active' => true,
            ]
        );
    }

    public function down(): void
    {
        PortfolioProject::where('slug', 'robota-industries-platform')->delete();
    }
};
