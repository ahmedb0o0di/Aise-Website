<?php

namespace App\Filament\Resources\PricingPlans\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PricingPlanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('currency')
                    ->required()
                    ->default('$'),
                TextInput::make('monthly_price')
                    ->required()
                    ->default('299'),
                TextInput::make('yearly_price')
                    ->default('239'),
                TextInput::make('period_label')
                    ->default('/month'),
                Textarea::make('description')
                    ->columnSpanFull(),
                Repeater::make('features')
                    ->schema([
                        TextInput::make('text')->required(),
                        Toggle::make('included')->default(true),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                Toggle::make('is_popular')
                    ->required(),
                TextInput::make('button_text')
                    ->required()
                    ->default('Get Started'),
                TextInput::make('button_link')
                    ->required()
                    ->default('#contact'),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
