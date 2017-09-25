<?php

namespace KraftHaus\WebClip\Contracts\Element;

use KraftHaus\WebClip\Eloquent\Models\Page;

interface Repository
{
    /**
     * Get all configured elements.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAllElements();

    /**
     * Get all elements by website.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Page $page
     * @return \Illuminate\Support\Collection
     */
    public function getAllElementsByPage(Page $page);
}
