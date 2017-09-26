<?php

namespace KraftHaus\WebClip;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;

class WebClipServiceProvider extends ServiceProvider
{
    use EventMap, ServiceBindings, Macroables, ModelObservers;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerEvents();
        $this->registerResources();
        $this->defineAssetPublishing();
        $this->registerModelObservers();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (! defined('WEBCLIP_PATH')) {
            define('WEBCLIP_PATH', realpath(__DIR__.'/../'));
        }

        $this->configure();
        $this->offerPublishing();
        $this->registerServices();
        $this->registerCommands();
        $this->registerMacros();

        require __DIR__.'/Support/helpers.php';
    }

    /**
     * Register the WebClip job events.
     *
     * @return void
     */
    protected function registerEvents()
    {
        $events = $this->app->make(Dispatcher::class);

        foreach ($this->events as $event => $listeners) {
            foreach ($listeners as $listener) {
                $events->listen($event, $listener);
            }
        }
    }

    /**
     * Register the WebClip resources.
     *
     * @return void
     */
    protected function registerResources()
    {
        $this->loadViewsFrom(WEBCLIP_PATH.'/resources/views', 'webclip');
        $this->loadMigrationsFrom(WEBCLIP_PATH.'/database/migrations');
    }

    /**
     * Register the model observers
     *
     * @return void
     */
    protected function registerModelObservers()
    {
        foreach ($this->observers as $model => $observer) {
            $model::observe($observer);
        }
    }

    /**
     * Define the asset publishing configuration.
     *
     * @return void
     */
    protected function defineAssetPublishing()
    {
        $this->publishes([
            WEBCLIP_PATH.'/public' => public_path('vendor/webclip'),
        ], 'webclip-assets');
    }

    /**
     * Setup the configuration for WebClip.
     *
     * @return void
     */
    protected function configure()
    {
        $this->mergeConfigFrom(
            WEBCLIP_PATH.'/config/webclip.php', 'webclip'
        );
    }

    /**
     * Setup the resource publishing groups for WebClip.
     *
     * @return void
     */
    protected function offerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                WEBCLIP_PATH.'/config/webclip.php' => config_path('webclip.php'),
            ], 'webclip-config');
        }
    }

    /**
     * Register WebClip's services in the container.
     *
     * @return void
     */
    protected function registerServices()
    {
        foreach ($this->providers as $value) {
            $this->app->register($value);
        }

        foreach ($this->bindings as $key => $value) {
            is_numeric($key)
                ? $this->app->singleton($value)
                : $this->app->singleton($key, $value);
        }
    }

    /**
     * Register the WebClip Artisan commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\AssetsCommand::class,
                Console\InstallCommand::class,
            ]);
        }
    }

    /**
     * Register the WebClip macros.
     *
     * @return void
     */
    protected function registerMacros()
    {
        foreach ($this->macros as $macro) {
            $this->{$this->getMacroMethod($macro)}();
        }
    }
}
