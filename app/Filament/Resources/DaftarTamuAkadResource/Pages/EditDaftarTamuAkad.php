<?php

namespace App\Filament\Resources\DaftarTamuAkadResource\Pages;

use App\Filament\Resources\DaftarTamuAkadResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditDaftarTamuAkad extends EditRecord
{
    protected static string $resource = DaftarTamuAkadResource::class;

    protected function afterCreate(): void
    {
        Notification::make()
            ->title('Tamu berhasil diedit!')
            ->success()
            ->send();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
