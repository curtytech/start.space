<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'color',
        'sort_order',
        'is_active',
        'user_id',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

      public function scopeActiveOrdered($query)
    {
        return $query->where('user_id', auth()->id())->where('is_active', true)->orderBy('sort_order')->orderBy('name');
    }

    // 🔗 Categoria pertence a um usuário (ou null = global)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function megaMenuItems(): HasMany
    {
        return $this->hasMany(MegaMenuItem::class);
    }
}
