<?php

namespace App\Filament\Resources\PesananResource\Widgets;

use App\Models\Pesanan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class PesananStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('New Order', Pesanan::query()->where('status','new')->count()),
            Stat::make('Proses', Pesanan::query()->where('status','proses')->count()),
            // Stat::make('Dikirim', Pesanan::query()->where('status','dikirim')->count()),
            Stat::make('Diterima', Pesanan::query()->where('status','diterima')->count()),
            // Stat::make('Cancel', Pesanan::query()->where('status','cancel')->count()),
            Stat::make('Total Pendapatan',Number::currency(Pesanan::query()->sum('total_harga'),'IDR'))
        ];
    }
}
