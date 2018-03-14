<?php

namespace Modules\Vocabulary\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Vocabulary\Repositories\GroupRepository;
use Modules\Vocabulary\Repositories\GroupRepositoryEloquent;
use Modules\Vocabulary\Repositories\WordRepository;
use Modules\Vocabulary\Repositories\WordRepositoryEloquent;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(WordRepository::class, WordRepositoryEloquent::class);
        $this->app->bind(GroupRepository::class, GroupRepositoryEloquent::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
