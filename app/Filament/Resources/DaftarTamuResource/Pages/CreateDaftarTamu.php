<?php

namespace App\Filament\Resources\DaftarTamuResource\Pages;

use App\Filament\Resources\DaftarTamuResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateDaftarTamu extends CreateRecord
{
    protected static string $resource = DaftarTamuResource::class;
    protected function afterCreate(): void
    {
        Notification::make()
            ->title('Tamu berhasil ditambahkan!')
            ->success()
            ->send();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
