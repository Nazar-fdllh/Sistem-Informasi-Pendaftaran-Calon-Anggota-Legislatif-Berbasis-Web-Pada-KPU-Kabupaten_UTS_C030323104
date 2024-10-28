<?php

namespace App\Filament\Resources\StatusPendaftaranResource\Pages;

use App\Filament\Resources\StatusPendaftaranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStatusPendaftaran extends EditRecord
{
    protected static string $resource = StatusPendaftaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
