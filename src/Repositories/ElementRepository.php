<?php

namespace KraftHaus\WebClip\Repositories;

use KraftHaus\WebClip\Eloquent\Models\Page;
use KraftHaus\WebClip\Eloquent\Models\Collection;
use KraftHaus\WebClip\Contracts\Element\Repository;

class ElementRepository implements Repository
{
    /**
     * The website model.
     *
     * @var \KraftHaus\WebClip\Eloquent\Models\Element
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
     * Get all configured elements.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAllElements()
    {
        return collect(config('webclip.elements'))
            ->map(function ($namespace, $key) {
                return [
                    'element' => $key,
                    'title' => $namespace::$title
                ];
            })
            ->groupBy(function ($item, $key) {
                return array_first(explode('.', $key));
            });
    }

    /**
     * Get all elements by page.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Page $page
     * @return \Illuminate\Support\Collection
     */
    public function getAllElementsByPage(Page $page)
    {
        return $page->elements;
    }
}
