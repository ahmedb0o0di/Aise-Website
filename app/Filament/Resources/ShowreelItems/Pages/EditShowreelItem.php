<?php

namespace App\Filament\Resources\ShowreelItems\Pages;

use App\Filament\Resources\ShowreelItems\ShowreelItemResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditShowreelItem extends EditRecord
{
    protected static string $resource = ShowreelItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
