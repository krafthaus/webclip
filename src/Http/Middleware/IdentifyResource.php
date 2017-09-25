<?php

namespace KraftHaus\WebClip\Http\Middleware;

use KraftHaus\WebClip\Http\Routing\Router;

class IdentifyResource
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, \Closure $next)
    {
        return $next(
            (new Router)->dispatch($request)
        );
    }
}
