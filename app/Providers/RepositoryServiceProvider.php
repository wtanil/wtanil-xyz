<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Contracts\ProjectInterface',
            'App\Repositories\ProjectRepository'
            );

        $this->app->bind(
            'App\Contracts\TagInterface',
            'App\Repositories\TagRepository'
            );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
