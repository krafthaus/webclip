<?php

namespace KraftHaus\WebClip\Http\Routing\Matching;

use Illuminate\Http\Request;

interface MatcherInterface
{
    /**
     * Validate a given rule against a request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return bool
     */
    public function matches(Request $request);
}
