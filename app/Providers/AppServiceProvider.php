<?php

namespace App\Providers;

use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repos\Contracts\AbstractRepositoryInterface',
            'App\Repos\Eloquent\AbstractRepository'
        );

        $this->app->bind(
            'App\Repos\Contracts\ArticleRepositoryInterface',
            'App\Repos\Eloquent\ArticleRepository'
        );

        $this->app->bind(
            'App\Repos\Contracts\CategoryRepositoryInterface',
            'App\Repos\Eloquent\CategoryRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      
    }
}
