<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DaftarTamuAkadResource\Pages;
use App\Filament\Resources\DaftarTamuAkadResource\RelationManagers;
use App\Models\Tamu_Akad;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DaftarTamuAkadResource extends Resource
{
    protected static ?string $model = Tamu_Akad::class;

    protected static ?string $navigationIcon = 'heroicon-o-Users';

    protected static ?string $navigationGroup = 'Daftar Tamu';

    protected static ?string $navigationLabel = 'Daftar Tamu Akad';

    protected static ?string $pluralModelLabel = 'List Daftar Tamu Akad VIP';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('nama_tamu_akad')
                ->label('Nama Tamu Akad')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('alamat')
                ->label('Alamat')
                ->required()
                ->maxLength(255),

            Forms\Components\Select::make('kehadiran')
                ->label('Kehadiran')
                ->options([
                    'hadir' => 'Hadir',
                    'tidak' => 'Tidak Hadir',
                ])
                ->default('tidak')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('nama_tamu_akad')
                ->label('Nama Tamu Akad')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('alamat')
                ->label('Alamat')
                ->searchable(),

            Tables\Columns\ToggleColumn::make('kehadiran')
                ->label('Kehadiran')
                ->onColor('success')
                ->offColor('danger')
                ->getStateUsing(fn ($record) => $record->kehadiran === 'hadir')
                ->updateStateUsing(function ($state, $record) {
                    $record->kehadiran = $state ? 'hadir' : 'tidak';
                    $record->save();
                    return $record->kehadiran === 'hadir';
                }),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('kehadiran')
                ->options([
                    'hadir' => 'Hadir',
                    'tidak' => 'Tidak Hadir',
                ])
                ->label('Filter Kehadiran'),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ])
        ->poll('3s');
}




    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDaftarTamuAkads::route('/'),
            'create' => Pages\CreateDaftarTamuAkad::route('/create'),
            'edit' => Pages\EditDaftarTamuAkad::route('/{record}/edit'),
        ];
    }
}
