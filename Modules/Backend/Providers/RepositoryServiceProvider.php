<?php

namespace Modules\Backend\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\Modules\Backend\Repositories\LanguageRepository::class, \Modules\Backend\Repositories\LanguageRepositoryEloquent::class);
        //:end-bindings:
    }
}
