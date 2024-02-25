<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siap extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "link",
        'logo',
        'description',
        "is_active",
        "created_by",
        "updated_by"
    ];

    protected $casts = [
        "content" => "array",
    ];

    public function author()
    {
        return $this->belongsTo(User::class, "created_by", "id");
    }
}
