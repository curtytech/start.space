<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Support\Facades\Route;

class Login extends BaseLogin
{
    public static function routes($router)
    {
        $router->group(['middleware' => 'guest'], function ($router) {
            $router->get('admin/login', static::class)->name('filament.admin.auth.login');
            $router->post('admin/login', static::class)->name('filament.admin.auth.login');
        });
    }
}
