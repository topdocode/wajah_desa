<?php

namespace App\Filament\Resources\SiapResource\Pages;

use App\Filament\Resources\SiapResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSiap extends ListRecords
{
    protected static string $resource = SiapResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
