<?php

namespace App\Filament\Resources\ShowreelItems\Pages;

use App\Filament\Resources\ShowreelItems\ShowreelItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListShowreelItems extends ListRecords
{
    protected static string $resource = ShowreelItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
