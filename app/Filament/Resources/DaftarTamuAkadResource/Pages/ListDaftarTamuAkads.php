<?php

namespace App\Filament\Resources\DaftarTamuAkadResource\Pages;

use App\Filament\Resources\DaftarTamuAkadResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDaftarTamuAkads extends ListRecords
{
    protected static string $resource = DaftarTamuAkadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
