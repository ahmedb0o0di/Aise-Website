<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('portfolio_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('client')->nullable();
            $table->string('year')->nullable()->default('2026');
            $table->string('services_provided')->nullable();
            $table->text('overview')->nullable();
            $table->text('challenges')->nullable();
            $table->text('solution')->nullable();
            $table->text('results')->nullable();
            $table->string('live_url')->nullable();
            $table->integer('card_height')->default(300); // 380px or 300px in grid
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_projects');
        Schema::dropIfExists('portfolio_categories');
    }
};
