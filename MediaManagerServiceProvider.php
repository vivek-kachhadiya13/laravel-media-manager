<?php

namespace Webelightdev\LaravelMediaManager;

use Illuminate\Support\ServiceProvider;

class LaravelMediaManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Config
        $this->publishes([__DIR__.'/../config/laravel-mediaManager.php' => config_path('laravel-mediaManager.php')]);
        // Migration
       $this->publishes([__DIR__.'/../database/migrations' => $this->app->databasePath().'/migrations'], 'migrations');

       include __DIR__.'/routes.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind('laravel-mediaManager', function () {
           return new LaravelMediaManagerClass();
       });

       $this->app->make('Webelightdev\LaravelMediaManager\Controller\MediaController');
       $this->loadViewsFrom(__DIR__.'/resources/media/', 'laravel-mediaManager');
    }
}