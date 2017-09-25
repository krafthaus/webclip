<?php

namespace KraftHaus\WebClip\Http\Routing\Matching;

use Illuminate\Http\Request;
use KraftHaus\WebClip\Contracts\Page\Repository;

class PageMatcher implements MatcherInterface
{
    /**
     * The page repository implementation.
     *
     * @var \KraftHaus\WebClip\Contracts\Page\Repository
     */
    protected $pages;

    /**
     * Create a new page matcher instance.
     *
     * @param  \KraftHaus\WebClip\Contracts\Page\Repository $pages
     * @return void
     */
    public function __construct(Repository $pages)
    {
        $this->pages = $pages;
    }

    /**
     * Validate a given rule against a request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \KraftHaus\WebClip\Eloquent\Models\Page|null
     */
    public function matches(Request $request)
    {
        return $this->pages->getPageByPath(
            $request->get('website'), $request->path()
        );
    }
}
