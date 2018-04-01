<?php

namespace Modules\Shutterstock\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Shutterstock\Repositories\CardRepository;
use Modules\Shutterstock\Repositories\CardRepositoryEloquent;
use Modules\Shutterstock\Repositories\ShutterstockRepository;
use Modules\Shutterstock\Repositories\ShutterstockRepositoryEloquent;
use Modules\Shutterstock\Repositories\TopicRepository;
use Modules\Shutterstock\Repositories\TopicRepositoryEloquent;

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
