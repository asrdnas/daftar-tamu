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
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TamuExport;
use Filament\Tables\Actions\Action;


class DaftarTamuResource extends Resource
{
    protected static ?string $model = Tamu::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Daftar Tamu Resepsi';

    protected static ?string $navigationGroup = 'Daftar Tamu';

     protected static ?string $pluralModelLabel = 'List Daftar Tamu Resepsi VIP';

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

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'VIP' => 'VIP',
                        'VVIP' => 'VVIP',
                    ])
                    ->default('VVIP')
                    ->required(),
                Forms\Components\Select::make('status_tamu')
                    ->label('Status Tamu')
                    ->options([
                        'stay' => 'stay',
                        'pulang' => 'pulang',
                    ])
                    ->default('stay')
                    ->required(),
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
        // Kolom Nama Tamu
        Tables\Columns\TextColumn::make('nama_tamu')
            ->label('Nama Tamu')
            ->searchable()
            ->sortable()
            ->weight('bold')
            ->alignStart(),

        // Kolom Alamat
        Tables\Columns\TextColumn::make('alamat')
            ->label('Alamat')
            ->limit(100)
            ->tooltip(fn ($record) => $record->alamat)
            ->wrap()
            ->alignCenter(),

        // Kolom Status (VIP / REGULER)
        Tables\Columns\TextColumn::make('status')
            ->label('Status')
            ->formatStateUsing(fn ($state) => strtoupper($state))
            ->sortable()
            ->alignCenter(),

            Tables\Columns\ToggleColumn::make('status_tamu')
            ->label('Status Tamu')
            ->onIcon('heroicon-o-home')
            ->offIcon('heroicon-o-arrow-left')
            ->onColor('success')
            ->offColor('danger')
            ->alignCenter()
            ->disabledClick() 
            ->getStateUsing(fn ($record) => $record->status_tamu === 'stay')
            ->updateStateUsing(function ($state, $record) {
                $record->status_tamu = $state ? 'stay' : 'pulang';
                $record->save();
                return $record->status_tamu === 'stay';
            }),

        // Kolom Kehadiran (pakai toggle interaktif)
        Tables\Columns\ToggleColumn::make('kehadiran')
            ->label('Kehadiran')
            ->onIcon('heroicon-o-check-circle')
            ->offIcon('heroicon-o-x-circle')
            ->onColor('success')
            ->offColor('danger')
            ->alignCenter()
            ->disabledClick() // ⬅️ Tambahkan ini agar Filament tidak kirim boolean langsung ke DB
            ->getStateUsing(fn ($record) => $record->kehadiran === 'hadir')
            ->updateStateUsing(function ($state, $record) {
                $record->kehadiran = $state ? 'hadir' : 'tidak';
                $record->save();
                return $record->kehadiran === 'hadir';
            }),
    ])

        ->filters([
            Tables\Filters\SelectFilter::make('status')
                ->label('Filter Status')
                ->options([
                    'VIP' => 'VIP',
                    'VVIP' => 'VVIP',
                ]),
            Tables\Filters\SelectFilter::make('kehadiran')
                ->options([
                    'hadir' => 'Hadir',
                    'tidak' => 'Tidak Hadir',
                ])
                ->label('Filter Kehadiran'),
        ])
         ->headerActions([
            Action::make('export')
                ->label('Export ke Excel')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(function () {
                    return Excel::download(new TamuExport, 'daftar_tamu.xlsx');
                }),
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

        ->striped()
        ->poll('3s');
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
