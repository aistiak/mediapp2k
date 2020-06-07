<?php

namespace Laracademy\Commands;

use Illuminate\Support\ServiceProvider;

class ArtisanJokeServieProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('command.laracademy.istiak',function($app){
            return $app['Laracademy\Commands\JokeCommand'];
        });

        $this->commands('command.laracademy.istiak');
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
