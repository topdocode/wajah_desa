<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapor extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "link",
        "is_active",
        "created_by",
        "updated_by"
    ];

    public function author()
    {
        return $this->belongsTo(User::class, "created_by", "id");
    }

    protected function scopeIsActive(QueryBuilder $builder): QueryBuilder
    {
        return $builder->where("is_active", true);
    }
}
