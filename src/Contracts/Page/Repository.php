<?php

namespace KraftHaus\WebClip\Contracts\Page;

use KraftHaus\WebClip\Eloquent\Models\Website;

interface Repository
{
    /**
     * Get all pages by website.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Website $website
     * @return \Illuminate\Support\Collection
     */
    public function getAllPagesByWebsite(Website $website);

    /**
     * Get a page by a given path.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Website $website
     * @param  string $path
     * @return \KraftHaus\WebClip\Eloquent\Models\Page|null
     */
    public function getPageByPath(Website $website, $path);

    /**
     * Save a new model and return the instance.
     *
     * @param  Website $website
     * @param  array $attributes
     * @return \Illuminate\Database\Eloquent\Model|$this
     */
    public function createPage(Website $website, array $attributes = []);
}
