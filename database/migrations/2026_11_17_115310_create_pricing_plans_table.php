<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pricing_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Starter, Professional, Enterprise
            $table->string('currency')->default('$');
            $table->string('monthly_price')->default('299');
            $table->string('yearly_price')->nullable()->default('239'); // Discounted rate
            $table->string('period_label')->default('/month');
            $table->text('description')->nullable();
            $table->json('features')->nullable(); // [{"text": "Digital Marketing Strategy", "included": true}, ...]
            $table->boolean('is_popular')->default(false);
            $table->string('button_text')->default('Get Started');
            $table->string('button_link')->default('#contact');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pricing_plans');
    }
};
