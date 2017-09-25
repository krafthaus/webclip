<?php

namespace KraftHaus\WebClip\Http\Controllers;

use Illuminate\Routing\Controller;
use KraftHaus\WebClip\Eloquent\Models\Website;
use KraftHaus\WebClip\Eloquent\Models\Collection;
use KraftHaus\WebClip\Contracts\Collection\Repository;
use KraftHaus\WebClip\Http\Resources\CollectionResource;
use KraftHaus\WebClip\Http\Resources\CollectionEntryResource;

class CollectionsController extends Controller
{
    /**
     * The collection repository implementation.
     *
     * @var \KraftHaus\WebClip\Contracts\Collection\Repository
     */
    protected $collections;

    /**
     * Create a new collection controller instance.
     *
     * @param  \KraftHaus\WebClip\Contracts\Collection\Repository $collections
     * @return void
     */
    public function __construct(Repository $collections)
    {
        $this->collections = $collections;
    }

    /**
     * Get a list of all collections on the current website.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Website $website
     * @return \Illuminate\Http\Response
     */
    public function index(Website $website)
    {
        return CollectionResource::collection(
            $this->collections->getAllCollectionsByWebsite($website)
        );
    }

    /**
     * Show a single collection.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Website $website
     * @param  \KraftHaus\WebClip\Eloquent\Models\Collection $collection
     * @return \KraftHaus\WebClip\Http\Resources\CollectionResource
     */
    public function show(Website $website, Collection $collection)
    {
        return new CollectionResource($collection);
    }

    /**
     * Get a list of entries on the current website and collection.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Website $website
     * @param  \KraftHaus\WebClip\Eloquent\Models\Collection $collection
     * @return \Illuminate\Http\JsonResponse
     */
    public function entries(Website $website, Collection $collection)
    {
        $entries = $this->collections->getAllEntriesByWebsiteAndCollection(
            $website, $collection
        );

        return CollectionEntryResource::collection($entries);
    }
}
