<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Filament\Resources\PesananResource;
use App\Models\Pesanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PesanansRelationManager extends RelationManager
{
    protected static string $relationship = 'pesanans';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                forms\Components\TextInput::make('name')->required(),
                forms\Components\TextInput::make('email')
                    ->label('email address')
                    ->email()
                    ->maxLength(255)
                    ->unique(ignoreRecord:true)
                    ->required(),
                forms\Components\DateTimePicker::make('email_verified_at')
                    ->label('Email Verified At')
                    ->default(now()),
                forms\Components\TextInput::make('password')
                    ->password()
                    ->dehydrated(fn($state) => filled($state))
                    ->required(fn($livewire): bool => $livewire instanceof CreateRecord),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                TextColumn::make('id')
                    ->label('Pesanan ID')
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
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('View Order')
                    ->url(fn(Pesanan $record): string => PesananResource::getUrl('view',['record'=>$record]))
                    ->color('info')
                    ->icon('heroicon-o-eye'),
                    DeleteAction::make()
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
