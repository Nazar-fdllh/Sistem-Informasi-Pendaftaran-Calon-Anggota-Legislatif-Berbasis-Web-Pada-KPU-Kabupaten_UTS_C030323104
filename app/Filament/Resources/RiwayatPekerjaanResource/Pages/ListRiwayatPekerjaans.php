<?php

namespace App\Filament\Resources\RiwayatPekerjaanResource\Pages;

use App\Filament\Resources\RiwayatPekerjaanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRiwayatPekerjaans extends ListRecords
{
    protected static string $resource = RiwayatPekerjaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
