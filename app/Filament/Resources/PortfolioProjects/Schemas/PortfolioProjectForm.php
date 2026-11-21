<?php

namespace App\Filament\Resources\PortfolioProjects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PortfolioProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('portfolio_category_id')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                FileUpload::make('image')
                    ->image(),
                TextInput::make('client'),
                TextInput::make('year')
                    ->default('2026'),
                TextInput::make('services_provided'),
                Textarea::make('overview')
                    ->columnSpanFull(),
                Textarea::make('challenges')
                    ->columnSpanFull(),
                Textarea::make('solution')
                    ->columnSpanFull(),
                Textarea::make('results')
                    ->columnSpanFull(),
                TextInput::make('live_url')
                    ->url(),
                TextInput::make('card_height')
                    ->required()
                    ->numeric()
                    ->default(300),
                Toggle::make('is_featured')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
