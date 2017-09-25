<?php

namespace KraftHaus\WebClip;

use KraftHaus\WebClip\Eloquent\{Models, Observers};

trait ModelObservers
{
    /**
     * All of the model observer mappings.
     *
     * @var array
     */
    protected $observers = [
        Models\Page::class => Observers\PageObserver::class,
        Models\Website::class => Observers\WebsiteObserver::class,
        Models\Collection::class => Observers\CollectionObserver::class,
        Models\CollectionEntry::class => Observers\CollectionEntryObserver::class,
    ];
}
