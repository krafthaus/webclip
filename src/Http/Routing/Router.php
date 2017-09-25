<?php

namespace KraftHaus\WebClip\Http\Routing;

use Illuminate\Http\Request;

class Router
{
    /**
     * Dispatch the request to the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Request
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function dispatch(Request $request)
    {
        // We've found a matching website so let's find our
        // what resource matches our current request.
        $resource = $this->matches($request);

        $request->attributes->add(compact('resource'));

        return $request;
    }

    /**
     * Determine that the current request matches one of the resources.
     * When nothing matches, a 404 response will be thrown. Otherwise
     * the matched record will be returned for further dispatching.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Model|null
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    protected function matches(Request $request)
    {
        $matchers = [
            'page' => resolve(Matching\PageMatcher::class),
            'collection' => resolve(Matching\CollectionMatcher::class),
        ];

        foreach ($matchers as $resource => $matcher) {
            if ($match = $matcher->matches($request)) {
                return $match;
            }
        }

        abort(404);
    }
}
