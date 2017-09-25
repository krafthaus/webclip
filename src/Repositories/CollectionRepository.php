<?php

namespace KraftHaus\WebClip\Repositories;

use KraftHaus\WebClip\Eloquent\Models\Website;
use KraftHaus\WebClip\Eloquent\Models\Collection;
use KraftHaus\WebClip\Contracts\Collection\Repository;

class CollectionRepository implements Repository
{
    /**
     * The website model.
     *
     * @var \KraftHaus\WebClip\Eloquent\Models\Website
     */
    protected $model;

    /**
     * Create a new collection repository instance.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Collection $model
     * @return void
     */
    public function __construct(Collection $model)
    {
        $this->model = $model;
    }

    /**
     * Save a new model and return the instance.
     *
     * @param  array $attributes
     * @return \Illuminate\Database\Eloquent\Model|$this
     */
    public function createCollection(array $attributes = [])
    {
        return $this->model->create($attributes);
    }

    /**
     * Get all collections by website.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Website $website
     * @return \Illuminate\Support\Collection
     */
    public function getAllCollectionsByWebsite(Website $website)
    {
        return $this->model
            ->where([
                'website_id' => $website->getKey(),
            ])
            ->orderBy('name')
            ->get();
    }

    /**
     * Get all entries by collection.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Collection $collection
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllEntriesByCollection(Collection $collection)
    {
        return $collection->entries()
            ->orderBy('created_at')
            ->paginate();
    }

    public function getCollectionByParts($collection, $entry)
    {
        return Collection::select('collection_entries.*')
            ->leftJoin('collection_entries', 'collection_entries.collection_id', '=', 'collections.id')
            ->where('collections.slug', $collection)
            ->where('collection_entries.slug', $entry)
            ->first();
    }
}
