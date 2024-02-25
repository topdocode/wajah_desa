<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use App\Filament\Resources\GalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Database\Eloquent\Model;

class ManageGalleries extends ManageRecords
{
    protected static string $resource = GalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->using(function(array $data, string $model) {
                    $image = [];
                    foreach ($data["galleries"] as $media) {
                         $image[] = $model::create([
                            "title" => $media["title"],
                            "media"  => $media["media"],
                            "is_featured" => $data["is_featured"] ?? false,
                         ]);
                    }     
                    
                    return $image[0];
                })
        ];
    }
}
