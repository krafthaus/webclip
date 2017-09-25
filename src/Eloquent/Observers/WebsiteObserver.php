<?php

namespace KraftHaus\WebClip\Eloquent\Observers;

use Ramsey\Uuid\Uuid;
use KraftHaus\WebClip\Eloquent\Models\Website;

class WebsiteObserver
{
    /**
     * Listen to the website creating event.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Website $website
     * @return void
     */
    public function creating(Website $website)
    {
        $website->uuid = Uuid::uuid4()->toString();
    }

    /**
     * Listen to the website created event.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Website $website
     * @return void
     */
    public function created(Website $website)
    {
        $this->createHomepage($website);
        $this->create404Page($website);
    }

    /**
     * Create the homepage.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Website $website
     * @return void
     */
    protected function createHomepage(Website $website)
    {
        $website->pages()->create([
            'name' => 'Homepage',
            'slug' => '/',
        ]);
    }

    /**
     * Create the 404 page.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Website $website
     * @return void
     */
    protected function create404Page(Website $website)
    {
        $website->pages()->create([
            'name' => '404',
            'slug' => '/',
        ]);
    }
}
