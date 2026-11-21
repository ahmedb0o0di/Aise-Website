<?php

use App\Models\PortfolioCategory;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        PortfolioCategory::where('slug', 'web')->update(['name' => 'Web Design & Development']);
    }

    public function down(): void
    {
        PortfolioCategory::where('slug', 'web')->update(['name' => 'Web Design']);
    }
};
