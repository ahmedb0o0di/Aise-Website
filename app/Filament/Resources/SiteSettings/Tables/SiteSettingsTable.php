<?php

namespace App\Filament\Resources\SiteSettings\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SiteSettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('site_name')
                    ->label('Brand Name')
                    ->weight('bold')
                    ->searchable(),

                TextColumn::make('tagline')
                    ->label('Tagline')
                    ->limit(50)
                    ->searchable(),

                TextColumn::make('logo_dark')
                    ->label('Dark Logo')
                    ->limit(30),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('M d, Y H:i')
                    ->sortable(),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
