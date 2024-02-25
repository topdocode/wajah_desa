<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory, HasSlug;
    protected $fillable = [
        "title",
        "slug",
        "location",
        "cover",
        "description",
        "is_featured",
        "content",
        "article_date",
        "status",
        "created_by",
        "updated_by",
    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, "created_by");
    }

    protected function scopeFeatured(QueryBuilder $builder): QueryBuilder
    {
        return $builder->where("is_featured", true);
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, "created_by");
    }

    protected function scopeSearch($query, $value)
    {
        return $value ? $query->where("title", "LIKE", "$value%")->orWhere("description", "LIKE", "$value%") : $query;
    }
}
