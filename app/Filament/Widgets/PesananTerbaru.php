<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\PesananResource;
use App\Models\Pesanan;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class PesananTerbaru extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 2;
    public function table(Table $table): Table
    {
        return $table
        ->query(PesananResource::getEloquentQuery())
        ->defaultPaginationPageOption(5)
        ->defaultSort('created_at','desc')
        ->columns([
            TextColumn::make('id')
                ->label('Pesanan ID')
                ->searchable(),
            TextColumn::make('user.name')
                ->searchable(),
            TextColumn::make('total_harga')
                ->money('IDR'),
            TextColumn::make('status')
                ->badge()
                ->color(fn(string $state):string => match($state){
                    'new' => 'info',
                    'proses' => 'warning',
                    'dikirim' => 'success',
                    'diterima' => 'success',
                    'cancel' => 'danger',
            })
            ->icon(fn(string $state):string => match($state){
                'new' => 'heroicon-m-sparkles',
                'proses' => 'heroicon-m-arrow-path',
                'dikirim' => 'heroicon-m-truck',
                'diterima' => 'heroicon-m-check-badge',
                'cancel' => 'heroicon-m-x-circle',
            })
            ->sortable(),
            TextColumn::make('metode_pembayaran')
                ->sortable()
                ->searchable(),
            TextColumn::make('status_pembayaran')
                ->sortable()
                ->badge()
                ->searchable(),
            TextColumn::make('created_at')
                ->label('Tanggal Order')
                ->dateTime()
        ])
        ->actions([
            Action::make('view-order')
            ->url(fn(Pesanan $record): string => PesananResource::getUrl('view',['record' => $record]))
            ->icon('heroicon-m-eye')
        ]);
    }
}
