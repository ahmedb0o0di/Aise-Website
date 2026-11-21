<?php

namespace App\Filament\Resources\TickerItems\Pages;

use App\Filament\Resources\TickerItems\TickerItemResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTickerItem extends EditRecord
{
    protected static string $resource = TickerItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
