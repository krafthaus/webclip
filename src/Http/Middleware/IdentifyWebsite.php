<?php

namespace KraftHaus\WebClip\Http\Middleware;

use KraftHaus\WebClip\Http\Routing\Matching\WebsiteMatcher;

class IdentifyWebsite
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
        // Before we try to match anything we need to make sure the current
        // request matches a website. It makes zero sense to match
        // anything else whilst not having a matching website.
        if (! $website = resolve(WebsiteMatcher::class)->matches($request)) {
            abort(404);
        }

        // Add the currently matched website instance as an attribute
        // to the request so that we can conveniently use it later.
        $request->attributes->add(compact('website'));

        return $next($request);
    }
}
