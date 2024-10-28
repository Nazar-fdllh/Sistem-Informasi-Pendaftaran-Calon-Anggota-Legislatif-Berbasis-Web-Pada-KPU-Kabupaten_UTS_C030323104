<?php

namespace App\Filament\Resources\CalonLegislatifResource\Pages;

use App\Filament\Resources\CalonLegislatifResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCalonLegislatifs extends ListRecords
{
    protected static string $resource = CalonLegislatifResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
