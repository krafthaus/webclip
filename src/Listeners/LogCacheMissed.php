<?php

namespace KraftHaus\WebClip\Listeners;

use Illuminate\Support\Facades\Redis;

class LogCacheMissed
{
    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle()
    {
        // increment cache miss.
        Redis::incr('cache:misses:'.today());
    }
}
