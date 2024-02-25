<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait HandlesFileDeletion
{
    public static function bootHandlesFileDeletion()
    {
        static::updating(function ($model) {
            if ($model->isDirty('file_path')) {
                $originalFilePath = $model->getOriginal('file_path');
                if ($originalFilePath) {
                    Storage::delete($originalFilePath);
                }
            }
        });

        static::deleting(function ($model) {
            if ($filePath = $model->file_path) {
                Storage::delete($filePath);
            }
        });
    }

    protected function filePath(): Attribute
    {
        return Attribute::make(
            get: fn (array $attributes, mixed $value) => $attributes['image'] ?? null,
        );
    }
}