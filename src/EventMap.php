<?php

namespace KraftHaus\WebClip;

use Illuminate;
use KraftHaus\WebClip\Listeners;

trait EventMap
{
    /**
     * All of the WebClip event / listener mappings.
     *
     * @var array
     */
    protected $events = [
        Illuminate\Cache\Events\CacheMissed::class => [
            Listeners\LogCacheMissed::class,
        ],
    ];
}
