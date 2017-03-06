<?php

namespace JamesGifford\Blog\Providers;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $packageSrcDir = dirname(__DIR__);

        $this->loadMigrationsFrom($packageSrcDir.'/Migrations');
        $this->loadRoutesFrom($packageSrcDir.'/Routes/web.php');
        $this->loadViewsFrom($packageSrcDir.'/Views', 'blog');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('JamesGifford\Blog\Controllers\BlogController');
    }
}
