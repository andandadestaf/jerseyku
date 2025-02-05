<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesananResource\Pages;
use App\Filament\Resources\PesananResource\RelationManagers;
use App\Filament\Resources\PesananResource\RelationManagers\AlamatRelationManager;
use App\Models\Pesanan;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Number;

class PesananResource extends Resource
{
    protected static ?string $model = Pesanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Informasi Pesanan')->schema([
                        Select::make('user_id')
                            ->label('pelanggan')
                            ->relationship('user','name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('metode_pembayaran')
                            ->options([
                                'transfer' => 'transfer',
                                'cod' => 'Cash On Delivery'
                            ])
                            ->required(),
                        Select::make('status_pembayaran')
                            ->options([
                                'proses' => 'proses',
                                'dibayar' => 'dibayar',
                                'cancel' => 'cancel',
                            ])
                            ->default('proses')
                            ->required(),
                        ToggleButtons::make('status')
                            ->inline()
                            ->default('new')
                            ->required()
                            ->options([
                                'new' => 'new',
                                'proses' => 'proses',
                                'dikirim' => 'dikirim',
                                'diterima' => 'diterima',
                                'cancel' => 'cancel'
                            ])
                            ->colors([
                                'new' => 'info',
                                'proses' => 'warning',
                                'dikirim' => 'success',
                                'diterima' => 'success',
                                'cancel' => 'warning'
                            ])
                            ->icons([
                                'new' => 'heroicon-m-sparkles',
                                'proses' => 'heroicon-m-arrow-path',
                                'dikirim' => 'heroicon-m-truck',
                                'diterima' => 'heroicon-m-check-badge',
                                'cancel' => 'heroicon-m-x-circle'
                            ]),
                        Select::make('matauang')
                            ->options([
                                'idr' => 'IDR',
                                'usd' => 'USD'
                            ])
                            ->default('idr')
                            ->required(),
                        Select::make('metode_pengiriman')
                            ->options([
                                'jne' => 'JNE',
                                'sicepat' => 'SICEPAT'
                            ]),
                        Textarea::make('note')
                            ->columnSpanFull()
                    ])->columns(2),
                    Section::make('Detail Pesanan')->schema([
                        Repeater::make('detail')
                            ->relationship()
                            ->schema([
                                Select::make('produk_id')
                                    ->relationship('produk','nama')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->distinct()
                                    ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                    ->columnSpan(4)
                                    ->reactive()
                                    ->afterStateUpdated(fn($state, Set $set) => $set('unit_amount', Produk::find($state)?->harga ?? 0))
                                    ->afterStateUpdated(fn($state, Set $set) => $set('total_amount', Produk::find($state)?->harga ?? 0)),
                                TextInput::make('quantity')
                                    ->numeric()
                                    ->required()
                                    ->default(1)
                                    ->minValue(1)
                                    ->columnSpan(2)
                                    ->reactive()
                                    // ->afterStateUpdated(function($state, Set $set, Get $get){
                                    //     $unitAmount = $get('unit_amount')?? 0;
                                    //     $set ('total_amount',$state*$unitAmount);
                                    // }),
                                    ->afterStateUpdated(fn($state, Set $set, Get $get) => $set('total_amount',$state*$get('unit_amount'))),
                                TextInput::make('unit_amount')
                                    ->numeric()
                                    ->required()
                                    ->disabled()
                                    ->dehydrated()
                                    ->columnSpan(3),
                                TextInput::make('total_amount')
                                    ->numeric()
                                    ->required()
                                    ->dehydrated()
                                    ->columnSpan(3)
                            ])->columns(12),
                        Placeholder::make('total_harga_placeholder')
                            ->label('Subtotal')
                            ->content(function(Get $get, Set $set){
                                $total = 0;
                                if(!$repeaters = $get ('detail')){
                                    return $total;
                                }
                                foreach($repeaters as $key => $repeater){
                                    $total += $get ("detail.{$key}.total_amount");
                                }
                                $set('total_harga',$total);
                                return Number::currency($total,'IDR');
                            }),
                            Hidden::make('total_harga')
                                ->default(0)
                    ])                   
                ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Pelanggan')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('total_harga')
                    ->numeric()
                    ->sortable()
                    ->money('IDR'),
                TextColumn::make('metode_pembayaran')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('status_pembayaran')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('matauang')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('metode_pengiriman')
                    ->sortable()
                    ->searchable(),
                SelectColumn::make('status')
                    ->options([
                        'new' => 'new',
                        'proses' => 'proses',
                        'dikirim' => 'dikirim',
                        'diterima' => 'diterima',
                        'cancel' => 'cancel'
                    ])
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault:true),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            AlamatRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPesanans::route('/'),
            'create' => Pages\CreatePesanan::route('/create'),
            'view' => Pages\ViewPesanan::route('/{record}'),
            'edit' => Pages\EditPesanan::route('/{record}/edit'),
        ];
    }
}