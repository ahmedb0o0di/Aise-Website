<?php

use App\Models\PortfolioCategory;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        PortfolioCategory::where('slug', 'digital')->delete();
    }

    public function down(): void
    {
        // No down restoration needed
    }
};
