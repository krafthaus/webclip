<?php

namespace KraftHaus\WebClip\Contracts\Collection;

use KraftHaus\WebClip\Eloquent\Models\Website;
use KraftHaus\WebClip\Eloquent\Models\Collection;

interface Repository
{
    /**
     * Get all collections by website.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Website $website
     * @return \Illuminate\Support\Collection
     */
    public function getAllCollectionsByWebsite(Website $website);

    /**
     * Get all entries by collection.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Collection $collection
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllEntriesByCollection(Collection $collection);
}
