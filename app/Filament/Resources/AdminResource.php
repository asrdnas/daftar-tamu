<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdminResource\Pages;
use App\Filament\Resources\AdminResource\RelationManagers;
use App\Models\Admin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class AdminResource extends Resource
{
    protected static ?string $model = Admin::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Admin';

    protected static ?string $navigationGroup = 'Role Management';

    protected static ?string $pluralModelLabel = 'List Data Admin';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Section::make('Informasi Akun')
                ->description('Masukkan data akun VIP dengan benar.')
                ->icon('heroicon-o-user-circle')
                ->collapsible() // biar bisa dilipat kalau form makin panjang
                ->schema([
                    Grid::make(2)
                        ->schema([

                            Forms\Components\TextInput::make('username')
                                ->label('Username')
                                ->placeholder('Masukkan username unik')
                                ->required()
                                ->unique(ignoreRecord: true)
                                ->maxLength(50)
                                ->suffixIcon('heroicon-m-identification')
                                ->hint('Gunakan kombinasi huruf dan angka'),

                            Forms\Components\TextInput::make('name')
                                ->label('Nama Lengkap')
                                ->placeholder('Contoh: Jamalul Lail')
                                ->required()
                                ->maxLength(100)
                                ->suffixIcon('heroicon-m-user'),
                        ]),
                ]),

            Section::make('Keamanan & Kontak')
                ->icon('heroicon-o-lock-closed')
                ->collapsible()
                ->schema([
                    Grid::make(2)
                        ->schema([
                            Forms\Components\TextInput::make('email')
                                ->label('Alamat Email')
                                ->placeholder('contoh@email.com')
                                ->email()
                                ->required()
                                ->unique(ignoreRecord: true)
                                ->suffixIcon('heroicon-m-envelope'),

                            Forms\Components\TextInput::make('password')
                                ->password()
                                ->revealable()
                                ->label('Kata Sandi')
                                ->placeholder('Minimal 8 karakter')
                                ->helperText('Kosongkan jika tidak ingin mengubah password.')
                                ->dehydrateStateUsing(fn($state) => filled($state) ? Hash::make($state) : null)
                                ->dehydrated(fn($state) => filled($state))
                                ->suffixIcon('heroicon-m-key'),
                        ]),
                ]),
        ]);
}

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('username')
                ->label('Username')
                ->searchable()
                ->sortable()
                ->copyable()
                ->tooltip('Salin username')
                ->color('info')
                ->weight('medium'),

            Tables\Columns\TextColumn::make('name')
                ->label('Nama Lengkap')
                ->searchable()
                ->sortable()
                ->limit(20)
                ->wrap()
                ->color('success'),

            Tables\Columns\TextColumn::make('email')
                ->label('Email')
                ->searchable()
                ->sortable()
                ->icon('heroicon-m-envelope')
                ->copyable()
                ->tooltip('Salin email pengguna')
                ->color('primary'),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Dibuat')
                ->dateTime('d M Y')
                ->sortable()
                ->badge()
                ->color('gray'),

            Tables\Columns\TextColumn::make('updated_at')
                ->label('Diupdate')
                ->since() // tampilkan "2 jam yang lalu"
                ->sortable()
                ->badge()
                ->color('warning'),
        ])
        ->filters([
            // bisa tambahkan filter aktif/nonaktif dsb nanti
        ])
        ->actions([
            Tables\Actions\EditAction::make()
                ->label('Edit')
                ->icon('heroicon-m-pencil-square')
                ->color('info'),

            Tables\Actions\DeleteAction::make()
                ->label('Hapus')
                ->icon('heroicon-m-trash')
                ->color('danger')
                ->requiresConfirmation(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make()
                    ->label('Hapus Semua')
                    ->color('danger')
                    ->icon('heroicon-m-trash'),
            ]),
        ])
        ->striped() // baris bergantian warna
        ->paginated([10, 25, 50])
        ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListAdmins::route('/'),
            'create' => Pages\CreateAdmin::route('/create'),
            'edit' => Pages\EditAdmin::route('/{record}/edit'),
        ];
    }
}
