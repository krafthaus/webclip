<?php

namespace KraftHaus\WebClip\Listeners;

use League\StatsD\Laravel5\Facade\StatsdFacade as Statsd;

class LogCacheMissed
{
    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle()
    {
        Statsd::increment('cache:miss');
    }
}
