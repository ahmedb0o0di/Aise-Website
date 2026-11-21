<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Site Identity & SEO')
                    ->description('Global site branding and search engine meta configuration.')
                    ->components([
                        TextInput::make('site_name')
                            ->label('Website / Brand Name')
                            ->required()
                            ->default('Astra Intelligence Services'),

                        TextInput::make('tagline')
                            ->label('Brand Tagline')
                            ->default('We Transform Bold Ideas Into Digital Growth'),

                        Textarea::make('meta_description')
                            ->label('Default Meta Description')
                            ->rows(3)
                            ->columnSpanFull()
                            ->helperText('Used for SEO meta tags and social share previews.'),
                    ])
                    ->columns(2),

                Section::make('Logos & Favicon')
                    ->description('Asset paths for light and dark logo variations and browser icon.')
                    ->components([
                        TextInput::make('logo_dark')
                            ->label('Dark Logo Path')
                            ->placeholder('assets/images/logo.png')
                            ->helperText('Displayed on light backgrounds.'),

                        TextInput::make('logo_light')
                            ->label('Light Logo Path')
                            ->placeholder('assets/images/logo-white.png')
                            ->helperText('Displayed on dark backgrounds and preloader.'),

                        TextInput::make('favicon')
                            ->label('Favicon Path')
                            ->placeholder('favicon.png')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Social Media Channels')
                    ->description('Public social network URLs shown in the topbar and website footer.')
                    ->components([
                        TextInput::make('twitter_url')->label('X / Twitter URL')->url()->placeholder('https://x.com/...'),
                        TextInput::make('linkedin_url')->label('LinkedIn URL')->url()->placeholder('https://linkedin.com/company/...'),
                        TextInput::make('instagram_url')->label('Instagram URL')->url()->placeholder('https://instagram.com/...'),
                        TextInput::make('facebook_url')->label('Facebook URL')->url()->placeholder('https://facebook.com/...'),
                        TextInput::make('dribbble_url')->label('Dribbble URL')->url()->placeholder('https://dribbble.com/...'),
                        TextInput::make('youtube_url')->label('YouTube URL')->url()->placeholder('https://youtube.com/...'),
                    ])
                    ->columns(3),

                Section::make('Bottom Call-To-Action (CTA) Banner')
                    ->description('The high-conversion closing banner shown right above the footer.')
                    ->components([
                        TextInput::make('cta_badge')->label('CTA Badge')->default('Ready to Grow?'),
                        TextInput::make('cta_title')->label('CTA Title')->default("Let's Work Together & Build Something Great"),
                        Textarea::make('cta_description')->label('CTA Description')->rows(3)->columnSpanFull(),
                        TextInput::make('cta_button_text')->label('Button Label')->default('Start Free Consultation'),
                        TextInput::make('cta_button_link')->label('Button Link')->default('/contact'),
                    ])
                    ->columns(2),

                Section::make('Footer Content & Legal')
                    ->description('Copyright statement and brief company summary in the footer.')
                    ->components([
                        Textarea::make('footer_about')
                            ->label('Footer Short Bio')
                            ->rows(3)
                            ->columnSpanFull(),

                        TextInput::make('footer_copyright')
                            ->label('Footer Copyright Notice')
                            ->default('© 2026 Astra Intelligence Services Egypt. All rights reserved.')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
