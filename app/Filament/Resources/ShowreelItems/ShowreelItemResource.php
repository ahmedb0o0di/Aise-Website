<?php

namespace App\Filament\Resources\ShowreelItems;

use App\Filament\Resources\ShowreelItems\Pages\CreateShowreelItem;
use App\Filament\Resources\ShowreelItems\Pages\EditShowreelItem;
use App\Filament\Resources\ShowreelItems\Pages\ListShowreelItems;
use App\Filament\Resources\ShowreelItems\Schemas\ShowreelItemForm;
use App\Filament\Resources\ShowreelItems\Tables\ShowreelItemsTable;
use App\Models\ShowreelItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ShowreelItemResource extends Resource
{
    protected static ?string $model = ShowreelItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPlayCircle;

    protected static string|\UnitEnum|null $navigationGroup = 'Homepage Sections';

    protected static ?string $navigationLabel = 'Showreel Items';

    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return ShowreelItemForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ShowreelItemsTable::configure($table);
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
            'index' => ListShowreelItems::route('/'),
            'create' => CreateShowreelItem::route('/create'),
            'edit' => EditShowreelItem::route('/{record}/edit'),
        ];
    }
}


