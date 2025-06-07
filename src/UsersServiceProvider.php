<?php

namespace Tjall\Users;

use Tjall\Users\Console\Commands\CreateUser;
use Tjall\Users\Console\Commands\DeleteUser;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class UsersServiceProvider extends PackageServiceProvider {

    public function configurePackage(Package $package): void {
        $package
            ->name('laravel-users');
    }

    public function boot() {
        $this->commands([
            CreateUser::class,
            DeleteUser::class
        ]);

        $this->publishes([
            __DIR__.'/Filament/Resources' => app_path('Filament/Resources'),
        ], 'filament-resources');
    }
}
