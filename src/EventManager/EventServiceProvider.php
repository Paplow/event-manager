<?php

namespace Paplow\EventManager;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes.php');
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'eventManager');
        $this->loadMigrationsFrom(__DIR__.'/Migrations');

        $this->publishes([
            __DIR__.'/Resources/views' => \resource_path('views/vendor/eventManager'),
        ], 'views');

        $this->publishes([
            __DIR__.'/Migrations' => \database_path('migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/Resources/assets' => public_path('vendor/eventManager'),
        ], 'public');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}