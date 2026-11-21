<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default('Astra Intelligence Services');
            $table->string('tagline')->nullable()->default('We Transform Bold Ideas Into Digital Growth');
            $table->text('meta_description')->nullable();
            
            // Branding & Images
            $table->string('logo_dark')->nullable();
            $table->string('logo_light')->nullable();
            $table->string('favicon')->nullable();
            
            // Contact Information
            $table->string('contact_email')->nullable()->default('hello@mintonagency.com');
            $table->string('contact_email_secondary')->nullable()->default('projects@mintonagency.com');
            $table->string('contact_phone')->nullable()->default('+1 (555) 123-4567');
            $table->string('contact_phone_secondary')->nullable()->default('+1 (555) 987-6543');
            $table->string('contact_address')->nullable()->default('125 Creative Street, Design City, New York, NY 10001');
            $table->string('business_hours')->nullable()->default('Mon – Fri: 9:00 AM – 6:00 PM | Sat: 10:00 AM – 2:00 PM');
            
            // Social Links
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('dribbble_url')->nullable();
            $table->string('youtube_url')->nullable();

            // Hero Section Settings
            $table->string('hero_badge')->nullable()->default('Award-Winning Digital Agency');
            $table->string('hero_title')->nullable()->default('We Transform Bold Ideas Into Digital Growth');
            $table->text('hero_description')->nullable();
            $table->string('hero_video_url')->nullable()->default('https://www.youtube.com/watch?v=RXv_uIN6e-Y');

            // About Section Settings
            $table->string('about_badge')->nullable()->default('About Our Agency');
            $table->string('about_title')->nullable()->default("We're a Digital-First Creative Agency");
            $table->text('about_description_1')->nullable();
            $table->text('about_description_2')->nullable();
            $table->string('about_experience_years')->nullable()->default('12+');
            $table->string('about_clients_count')->nullable()->default('250+');
            $table->string('about_satisfaction_rate')->nullable()->default('98%');
            $table->string('about_image')->nullable();

            // Bottom CTA Section Settings
            $table->string('cta_badge')->nullable()->default('Ready to Grow?');
            $table->string('cta_title')->nullable()->default("Let's Work Together & Build Something Great");
            $table->text('cta_description')->nullable();
            $table->string('cta_button_text')->nullable()->default('Start Free Consultation');
            $table->string('cta_button_link')->nullable()->default('/contact');

            // Footer
            $table->string('footer_about')->nullable();
            $table->string('footer_copyright')->nullable()->default('© 2026 Astra Intelligence Services Egypt. All rights reserved.');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
