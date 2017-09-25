<?php

namespace KraftHaus\WebClip\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Responsable;

class FrontendController extends Controller
{
    /**
     * Create a new frontend controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware([
            'identify-website',
            'identify-resource',
        ]);
    }

    /**
     * Handle the response for the frontendend.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function handle(Request $request)
    {
        if (($resource = $request->get('resource')) instanceof Responsable) {
            return $resource->toResponse($request);
        }

        abort(404);
    }
}
