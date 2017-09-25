<?php

namespace KraftHaus\WebClip\Providers;

use Illuminate\Support\Facades\Route;
use KraftHaus\WebClip\Http\Middleware\IdentifyWebsite;
use KraftHaus\WebClip\Http\Middleware\IdentifyResource;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'KraftHaus\WebClip\Http\Controllers';

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        $this->aliasMiddleware('identify-website', IdentifyWebsite::class);
        $this->aliasMiddleware('identify-resource', IdentifyResource::class);
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapFrontendRoutes();

        $this->mapMarketingRoutes();
    }

    /**
     * Define the "api" routes for the application.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::middleware('api')
             ->domain('app.b4.dev')
             ->namespace($this->namespace)
             ->group(WEBCLIP_PATH.'/routes/api.php');
    }

    /**
     * Define the "frontend" routes for the application.
     *
     * @return void
     */
    protected function mapFrontendRoutes()
    {
        Route::namespace($this->namespace)
             ->domain('{domain}.b4.dev')
             ->group(WEBCLIP_PATH.'/routes/frontend.php');
    }

    /**
     * Define the "marketing" routes for the application.
     *
     * @return void
     */
    protected function mapMarketingRoutes()
    {
        Route::namespace($this->namespace)
            ->middleware('web')
            ->group(WEBCLIP_PATH.'/routes/marketing.php');
    }
}
