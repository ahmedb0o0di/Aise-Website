<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('icon')
                    ->required()
                    ->default('fas fa-code'),
                Textarea::make('short_description')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('full_description')
                    ->columnSpanFull(),
                TagsInput::make('tags')
                    ->columnSpanFull(),
                Repeater::make('included_features')
                    ->schema([
                        TextInput::make('title')->required(),
                        Textarea::make('desc')->required(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->label('Header Image (Modal / Pop-up Banner)')
                    ->image()
                    ->directory('services')
                    ->visibility('public')
                    ->openable()
                    ->downloadable()
                    ->helperText('Upload a high-resolution cover/header image for this service. Displayed at the top of the pop-up modal. Recommended: 1200x600px.')
                    ->columnSpanFull(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
