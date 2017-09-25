<?php

namespace KraftHaus\WebClip\Eloquent\Observers;

use Ramsey\Uuid\Uuid;
use KraftHaus\WebClip\Eloquent\Models\Collection;

class CollectionObserver
{
    /**
     * Listen to the collection creating event.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Collection $collection
     * @return void
     */
    public function creating(Collection $collection)
    {
        $collection->uuid = Uuid::uuid4()->toString();
    }

    /**
     * Listen to the collection saving event.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Collection $collection
     * @return void
     */
    public function saving(Collection $collection)
    {
        $this->fixPluralName($collection);
        $this->fixSingularName($collection);
        $this->fixSlug($collection);
    }

    /**
     * Ensure that the collections plural name is correctly set.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Collection $collection
     * @return void
     */
    protected function fixPluralName(Collection $collection)
    {
        if ($collection->plural_name === null) {
            $collection->plural_name = str_plural($collection->name);
        }
    }

    /**
     * Ensure that the collections singular name is correctly set.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Collection $collection
     * @return void
     */
    protected function fixSingularName(Collection $collection)
    {
        if ($collection->singular_name === null) {
            $collection->singular_name = str_singular($collection->name);
        }
    }

    /**
     * Ensure that the collections slug is correctly set.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Collection $collection
     * @return void
     */
    protected function fixSlug(Collection $collection)
    {
        $collection->slug = str_slug($collection->slug ?: $collection->name);
    }
}
