<?php

namespace KraftHaus\WebClip\Eloquent\Observers;

use Ramsey\Uuid\Uuid;
use KraftHaus\WebClip\Eloquent\Models\Page;

class PageObserver
{
    /**
     * Listen to the page creating event.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Page $page
     * @return void
     */
    public function creating(Page $page)
    {
        $page->uuid = Uuid::uuid4()->toString();
    }

    /**
     * Listen to the page saving event.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Page $page
     * @return void
     */
    public function saving(Page $page)
    {
        $page->slug = '/'.ltrim(str_slug($page->slug), '/');
    }
}
