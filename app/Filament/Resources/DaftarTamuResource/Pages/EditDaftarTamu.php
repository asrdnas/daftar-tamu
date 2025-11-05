<?php

namespace App\Filament\Resources\DaftarTamuResource\Pages;

use App\Filament\Resources\DaftarTamuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditDaftarTamu extends EditRecord
{
    protected static string $resource = DaftarTamuResource::class;
    protected function afterCreate(): void
    {
        Notification::make()
            ->title('Tamu berhasil edit')
            ->success()
            ->send();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
