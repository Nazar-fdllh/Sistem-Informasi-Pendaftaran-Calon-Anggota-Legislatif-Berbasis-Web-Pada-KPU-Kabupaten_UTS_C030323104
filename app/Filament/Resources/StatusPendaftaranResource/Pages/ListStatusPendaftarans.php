<?php

namespace App\Filament\Resources\StatusPendaftaranResource\Pages;

use App\Filament\Resources\StatusPendaftaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatusPendaftarans extends ListRecords
{
    protected static string $resource = StatusPendaftaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
