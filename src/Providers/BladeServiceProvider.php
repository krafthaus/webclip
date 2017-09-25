<?php

namespace KraftHaus\WebClip\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('env', function ($env) {
            return app()->environment($env);
        });
    }
}
