<?php

namespace KraftHaus\WebClip\Repositories;

use KraftHaus\WebClip\Eloquent\Models\Page;
use KraftHaus\WebClip\Eloquent\Models\Website;
use KraftHaus\WebClip\Contracts\Page\Repository;

class PageRepository implements Repository
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
     * @param  \KraftHaus\WebClip\Eloquent\Models\Page $model
     * @return void
     */
    public function __construct(Page $model)
    {
        $this->model = $model;
    }

    /**
     * Get all pages by website.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Website $website
     * @return \Illuminate\Support\Collection
     */
    public function getAllPagesByWebsite(Website $website)
    {
        return Page::scoped(['website_id' => $website->getKey()])
            ->defaultOrder()
            ->withDepth()
            ->get();
    }

    /**
     * Get a page by a given path.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Website $website
     * @param  string $path
     * @return \KraftHaus\WebClip\Eloquent\Models\Page|null
     */
    public function getPageByPath(Website $website, $path)
    {
        $path = '/'.ltrim($path, '/');

        return $website->pages()
            ->where('slug', $path)
            ->where('is_folder', false)
            ->first();
    }

    /**
     * Save a new model and return the instance.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Website $website
     * @param  array $attributes
     * @return \Illuminate\Database\Eloquent\Model|$this
     */
    public function createPage(Website $website, array $attributes = [])
    {
        $model = new $this->model($attributes);
        $model->website()->associate($website);
        $model->save();

        return $model;
    }
}
