<?php

namespace App\Filament\Resources\LaporResource\Pages;

use App\Filament\Resources\LaporResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLapor extends CreateRecord
{
    protected static string $resource = LaporResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        return $data;
    }
}
