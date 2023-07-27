<?php

namespace Kolirt\Openstreetmap;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    protected $commands = [
        Commands\InstallCommand::class
    ];

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/openstreetmap.php', 'openstreetmap');

        $this->publishes([
            __DIR__ . '/../config/openstreetmap.php' => config_path('openstreetmap.php')
        ]);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->commands($this->commands);

        app()->bind('openstreetmap', function(){
            return new Openstreetmap();
        });
    }
}