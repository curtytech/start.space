<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\MegaMenuItem;
use App\Models\User;
use Database\Seeders\CategorySeeder;
use Database\Seeders\MegaMenuItemSeeder;

class UserObserver
{
    public function created(User $user): void
    {
        // Evita duplicar se por algum motivo já existirem itens
        if (MegaMenuItem::where('user_id', $user->id)->exists()) {
            return;
        }

        MegaMenuItemSeeder::seedForUser($user->id);

        // Evita duplicar se por algum motivo já existirem itens
        if (Category::where('user_id', $user->id)->exists()) {
            return;
        }

        CategorySeeder::seedForUser($user->id);
    }
}