<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "media",
        "link",
        "is_active"
    ];

    protected function file() : Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                try {
                    exif_imagetype(asset("storage/".$attributes["media"])); 
                    return $attributes["media"];
                } catch (\Throwable $th) {
                    return null;
                }
            } 
               
        );
    }
}
