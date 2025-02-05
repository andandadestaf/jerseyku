<?php

namespace App\Filament\Resources\LigaResource\Pages;

use App\Filament\Resources\LigaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLiga extends EditRecord
{
    protected static string $resource = LigaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
