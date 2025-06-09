<?php

namespace Tjall\Users;

use Tjall\Users\Console\Commands\CreateUser;
use Tjall\Users\Console\Commands\DeleteUser;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Tjall\Users\Models\Page;
use Tjall\Users\Observers\PageObserver;

class UsersServiceProvider extends PackageServiceProvider {

    public function configurePackage(Package $package): void {
        $package
            ->name('laravel-users')
            ->discoversMigrations()
            ->hasCommands([
                CreateUser::class,
                DeleteUser::class
            ])
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishMigrations()
                    ->askToRunMigrations();
            });
    }

    public function bootingPackage() {
        // publish filament resources
        $this->publishes([
            __DIR__.'/Filament/Resources' => app_path('Filament/Resources'),
        ], 'filament-resources');

        // load routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // load views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-users');
    }
}
