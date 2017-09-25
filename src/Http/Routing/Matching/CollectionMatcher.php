<?php

namespace KraftHaus\WebClip\Http\Routing\Matching;

use Illuminate\Http\Request;
use KraftHaus\WebClip\Contracts\Collection\Repository;

class CollectionMatcher implements MatcherInterface
{
    /**
     * The collection repository implementation.
     *
     * @var \KraftHaus\WebClip\Contracts\Collection\Repository
     */
    protected $collections;

    /**
     * Create a new collection matcher instance.
     *
     * @param  \KraftHaus\WebClip\Contracts\Collection\Repository $collections
     * @return void
     */
    public function __construct(Repository $collections)
    {
        $this->collections = $collections;
    }

    /**
     * Validate a given rule against a request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return bool
     */
    public function matches(Request $request)
    {
        $parts = explode('/', $request->path());

        if (count($parts) !== 2) {
            return false;
        }

        list($collection, $entry) = $parts;

        return $this->collections->getCollectionByParts(
            $collection, $entry
        );
    }
}
