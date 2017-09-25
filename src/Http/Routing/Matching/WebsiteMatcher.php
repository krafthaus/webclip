<?php

namespace KraftHaus\WebClip\Http\Routing\Matching;

use Illuminate\Http\Request;
use KraftHaus\WebClip\Contracts\Website\Repository;

class WebsiteMatcher implements MatcherInterface
{
    /**
     * The website repository implementation.
     *
     * @var \KraftHaus\WebClip\Contracts\Website\Repository
     */
    protected $websites;

    /**
     * Create a new website matcher instance.
     *
     * @param  \KraftHaus\WebClip\Contracts\Website\Repository $websites
     * @return void
     */
    public function __construct(Repository $websites)
    {
        $this->websites = $websites;
    }

    /**
     * Validate a given rule against a request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \KraftHaus\WebClip\Eloquent\Models\Website|null
     */
    public function matches(Request $request)
    {
        return $this->websites->getWebsiteByDomain(
            $request->getHost()
        );
    }
}
