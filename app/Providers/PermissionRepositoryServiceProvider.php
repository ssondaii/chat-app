<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PermissionRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register Interface::Class with container.
     *
     * @return void
     */
    public function register()
    {
        $this->registerPermissionRepository();
    }

    /**
     * register PermissionRepository
     *
     * @return void
     */
    public function registerPermissionRepository()
    {
        $this->app->bind(
            \App\Repositories\permission\PermissionRepositoryInterface::class,
            \App\Repositories\permission\PermissionEloquentRepository::class
        );
    }
}
