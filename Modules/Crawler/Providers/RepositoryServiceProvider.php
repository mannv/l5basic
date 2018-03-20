<?php

namespace Modules\Crawler\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Crawler\Repositories\CustomerRepository;
use Modules\Crawler\Repositories\CustomerRepositoryEloquent;

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
        $this->app->bind(CustomerRepository::class, CustomerRepositoryEloquent::class);
        //:end-bindings:
    }
}
