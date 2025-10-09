<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class MegaMenuItem extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'url',
        'icon',
        'color',
        'description',
        'sort_order',
        'is_active',
        'open_in_new_tab',
        'category',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'open_in_new_tab' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('title');
    }

    public function scopeByCategory(Builder $query, ?string $category = null): Builder
    {
        if ($category) {
            return $query->where('category', $category);
        }
        
        return $query;
    }
}
