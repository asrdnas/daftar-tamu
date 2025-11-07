<?php

namespace App\Filament\Resources\DaftarTamuAkadResource\Pages;

use App\Filament\Resources\DaftarTamuAkadResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateDaftarTamuAkad extends CreateRecord
{
    protected static string $resource = DaftarTamuAkadResource::class;
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
