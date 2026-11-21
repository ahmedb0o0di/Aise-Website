<?php

namespace App\Filament\Resources\TickerItems;

use App\Filament\Resources\TickerItems\Pages\CreateTickerItem;
use App\Filament\Resources\TickerItems\Pages\EditTickerItem;
use App\Filament\Resources\TickerItems\Pages\ListTickerItems;
use App\Filament\Resources\TickerItems\Schemas\TickerItemForm;
use App\Filament\Resources\TickerItems\Tables\TickerItemsTable;
use App\Models\TickerItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TickerItemResource extends Resource
{
    protected static ?string $model = TickerItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArrowsRightLeft;

    protected static string|\UnitEnum|null $navigationGroup = 'Homepage Sections';

    protected static ?string $navigationLabel = 'Rolling Ticker Items';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return TickerItemForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TickerItemsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTickerItems::route('/'),
            'create' => CreateTickerItem::route('/create'),
            'edit' => EditTickerItem::route('/{record}/edit'),
        ];
    }
}


