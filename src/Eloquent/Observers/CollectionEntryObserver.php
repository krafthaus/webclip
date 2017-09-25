<?php

namespace KraftHaus\WebClip\Eloquent\Observers;

use KraftHaus\WebClip\Eloquent\Models\CollectionEntry;

class CollectionEntryObserver
{
    /**
     * Listen to the entry saving event.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\CollectionEntry $entry
     * @return void
     */
    public function saving(CollectionEntry $entry)
    {
        $this->fixSlug($entry);
    }

    /**
     * Ensure that the entrys slug is correctly set.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\CollectionEntry $entry
     * @return void
     */
    protected function fixSlug(CollectionEntry $entry)
    {
        if ($entry->slug === null) {
            $entry->slug = str_slug($entry->name);
        }
    }
}
