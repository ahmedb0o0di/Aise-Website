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
                    ->image(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
