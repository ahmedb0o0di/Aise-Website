<?php

use App\Models\PortfolioProject;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        PortfolioProject::whereIn('slug', [
            'brand-identity-positioning',
            'social-growth-campaign',
            'seo-performance-campaign',
            'saas-platform-redesign',
            'brand-refresh-rebranding',
        ])->delete();
    }

    public function down(): void
    {
        // No down restoration needed for dummy seed records
    }
};
