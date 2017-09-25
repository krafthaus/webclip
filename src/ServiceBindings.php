<?php

namespace KraftHaus\WebClip;

trait ServiceBindings
{
    /**
     * All of the service providers for WebClip.
     *
     * @var array
     */
    protected $providers = [
        Providers\AuthServiceProvider::class,
        Providers\RouteServiceProvider::class,
        Providers\BladeServiceProvider::class,
        \Laravel\Cashier\CashierServiceProvider::class,
    ];

    /**
     * All of the service bindings for WebClip.
     *
     * @var array
     */
    protected $bindings = [
        Contracts\Team\Repository::class => Repositories\TeamRepository::class,
        Contracts\Page\Repository::class => Repositories\PageRepository::class,
        Contracts\Website\Repository::class => Repositories\WebsiteRepository::class,
        Contracts\Element\Repository::class => Repositories\ElementRepository::class,
        Contracts\Collection\Repository::class => Repositories\CollectionRepository::class,
    ];
}
