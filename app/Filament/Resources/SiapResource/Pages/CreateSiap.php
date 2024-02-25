<?php

namespace App\Filament\Resources\SiapResource\Pages;

use App\Filament\Resources\SiapResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSiap extends CreateRecord
{
    protected static string $resource = SiapResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        return $data;
    }
}
