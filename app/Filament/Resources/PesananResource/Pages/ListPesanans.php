<?php

namespace App\Filament\Resources\PesananResource\Pages;

use App\Filament\Resources\PesananResource;
use App\Filament\Resources\PesananResource\Widgets\PesananStats;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPesanans extends ListRecords
{
    protected static string $resource = PesananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return[
            PesananStats::class
        ];
    }

    // protected function getTab():array
    // {
    //     return[]
    // }
}
