<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DaftarTamuResource\Pages;
use App\Models\Tamu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;


class DaftarTamuResource extends Resource
{
    protected static ?string $model = Tamu::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Daftar Tamu';

     protected static ?string $pluralModelLabel = 'List Daftar Tamu VIP';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_tamu')
                    ->label('Nama Tamu')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('alamat')
                    ->label('Alamat')
                    ->required(),

                Forms\Components\TextInput::make('meja')
                    ->label('Meja')
                    ->required()
                    ->maxLength(50),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'VIP' => 'VIP',
                    ])
                    ->default('VIP')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('nama_tamu')
                ->label('Nama Tamu')
                ->searchable()
                ->sortable()
                ->description(fn ($record) => $record->status === 'VIP' ? 'Tamu kehormatan' : 'Tamu reguler')
                ->weight('bold')
                ->color(fn ($record) => $record->status === 'VIP' ? 'warning' : 'gray'),

            Tables\Columns\TextColumn::make('alamat')
                ->label('Alamat')
                ->searchable()
                ->limit(20)
                ->tooltip(fn ($record) => $record->alamat),

            Tables\Columns\TextColumn::make('meja')
                ->label('Meja')
                ->sortable()
                ->alignCenter()
                ->badge()
                ->color('success'),

            Tables\Columns\BadgeColumn::make('status')
                ->label('Status')
                ->colors([
                    'warning' => fn ($state) => $state === 'VIP',
                    'gray' => fn ($state) => $state === 'REGULER',
                ])
                ->icon(fn ($state) => $state === 'VIP' ? 'heroicon-o-star' : 'heroicon-o-user')
                ->formatStateUsing(fn ($state) => strtoupper($state))
                ->sortable(),
        ])

        ->filters([
            Tables\Filters\SelectFilter::make('status')
                ->label('Filter Status')
                ->options([
                    'VIP' => 'VIP',
                    'REGULER' => 'Reguler',
                ]),
        ])

        ->actions([
            Tables\Actions\EditAction::make()
                ->label('Edit')
                ->icon('heroicon-o-pencil-square')
                ->color('warning')
                ->tooltip('Edit data tamu ini'),

            Tables\Actions\DeleteAction::make()
                ->label('Hapus')
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->requiresConfirmation()
                ->tooltip('Hapus data tamu ini'),
        ])

        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make()
                    ->label('Hapus Terpilih')
                    ->color('danger'),
            ]),
        ])

        ->striped() // buat baris tabel bergantian warna agar mudah dibaca
        ->poll('5s'); // auto refresh tiap 5 detik (opsional)
}


    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDaftarTamus::route('/'),
            'create' => Pages\CreateDaftarTamu::route('/create'),
            'edit' => Pages\EditDaftarTamu::route('/{record}/edit'),
        ];
    }
}
