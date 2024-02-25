<?php

namespace App\Filament\Resources\SiapResource\Pages;

use App\Filament\Resources\SiapResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSiap extends EditRecord
{
    protected static string $resource = SiapResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave($data): array
    {
        $data['updated_by'] = auth()->id();

        return $data;
    }
}
