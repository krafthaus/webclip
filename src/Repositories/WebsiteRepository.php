<?php

namespace KraftHaus\WebClip\Repositories;

use KraftHaus\WebClip\Eloquent\Models\Website;
use KraftHaus\WebClip\Contracts\Website\Repository;

class WebsiteRepository implements Repository
{
    /**
     * The cache implementation.
     *
     * @var \Illuminate\Support\Facades\Cache
     */
    protected $cache;

    /**
     * The website model.
     *
     * @var \KraftHaus\WebClip\Eloquent\Models\Website
     */
    protected $model;

    /**
     * Create a new website repository instance.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Website $model
     * @return void
     */
    public function __construct(Website $model)
    {
        $this->model = $model;
    }

    /**
     * Get all active websites.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAllActiveWebsites()
    {
        return cache()->tags('repository', 'website')
            ->rememberForever('all-active-websites', function () {
                return $this->model->get();
            });
    }

    /**
     * Get all non-active websites.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getOnlyDeactivatedWebsites()
    {
        return cache()->tags('repository', 'website')
            ->rememberForever('only-deactivated-websites', function () {
                return $this->model->onlyDeactivated()->get();
            });
    }

    /**
     * Save a new model and return the instance.
     *
     * @param  array $attributes
     * @return \Illuminate\Database\Eloquent\Model|$this
     */
    public function createWebsite(array $attributes = [])
    {
        return $this->model->create($attributes);
    }

    /**
     * Get a website by domain.
     *
     * @param  string $domain
     * @return \KraftHaus\WebClip\Eloquent\Models\Website|null
     */
    public function getWebsiteByDomain($domain)
    {
        return $this->model->where('domain', $domain)->first();
    }
}
