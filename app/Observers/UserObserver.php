<?php

namespace App\Observers;

use App\Models\MegaMenuItem;
use App\Models\User;
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
    }
}