<?php

namespace App\Filament\Resources\RiwayatPekerjaanResource\Pages;

use App\Filament\Resources\RiwayatPekerjaanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRiwayatPekerjaan extends EditRecord
{
    protected static string $resource = RiwayatPekerjaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
