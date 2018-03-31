<?php

namespace Modules\Backend\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Backend\Repositories\CardRepository;
use Modules\Backend\Repositories\CardRepositoryEloquent;
use Modules\Backend\Repositories\ShutterstockRepository;
use Modules\Backend\Repositories\ShutterstockRepositoryEloquent;
use Modules\Backend\Repositories\TopicRepository;
use Modules\Backend\Repositories\TopicRepositoryEloquent;

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
        $this->app->bind(TopicRepository::class, TopicRepositoryEloquent::class);
        $this->app->bind(CardRepository::class, CardRepositoryEloquent::class);
        $this->app->bind(ShutterstockRepository::class, ShutterstockRepositoryEloquent::class);
    }
}
