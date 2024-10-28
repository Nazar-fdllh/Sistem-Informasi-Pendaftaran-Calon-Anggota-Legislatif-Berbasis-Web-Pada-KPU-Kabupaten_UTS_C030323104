<?php

namespace App\Filament\Resources\CalonLegislatifResource\Pages;

use App\Filament\Resources\CalonLegislatifResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCalonLegislatif extends EditRecord
{
    protected static string $resource = CalonLegislatifResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
