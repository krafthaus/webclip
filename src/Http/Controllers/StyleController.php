<?php

namespace KraftHaus\WebClip\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StyleController extends Controller
{
    /**
     * Create a new frontend controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('identify-website');
    }

    /**
     * Render the styles.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function render(Request $request)
    {
        $response = json_to_css(
            $request->get('website')->css_rules
        );

        return response($response, 200, [
            'Content-Type' => 'text/css',
        ]);
    }
}
