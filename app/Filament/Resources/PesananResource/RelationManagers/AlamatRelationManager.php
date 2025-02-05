<?php

namespace App\Filament\Resources\PesananResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlamatRelationManager extends RelationManager
{
    protected static string $relationship = 'alamat';

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('nama')
                    ->required()
                    ->maxlength(255),
                TextInput::make('nohp')
                    ->required()
                    ->maxlength(15)
                    ->tel(),
                TextInput::make('kota')
                    ->required()
                    ->maxlength(255),
                TextInput::make('provinsi')
                    ->required()
                    ->maxlength(255),
                TextInput::make('kode_pos')
                    ->required()
                    ->maxlength(7)
                    ->numeric(),
                TextArea::make('alamat')
                    ->required(),
                    // ->collumnSpanFull(),
            ]);
                }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('alamat')
            ->columns([
                TextColumn::make('nama')
                    ->label('Nama'),
                TextColumn::make('nohp'),
                TextColumn::make('kota'),
                TextColumn::make('provinsi'),
                TextColumn::make('kode_pos'),
                TextColumn::make('alamat'), 
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
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