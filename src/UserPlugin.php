<?php

namespace Tjall\Users;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Tjall\Users\Filament\Resources\UserResource;

class UserPlugin implements Plugin {
    public function getId(): string {
        return 'tjall/laravel-users';
    }

    public function register(Panel $panel): void {
        $panel
            ->resources([
                UserResource::class
            ]);
    }

    public function boot(Panel $panel): void {
        //
    }
}
