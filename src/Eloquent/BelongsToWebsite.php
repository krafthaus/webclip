<?php

namespace KraftHaus\WebClip\Eloquent;

use KraftHaus\WebClip\Eloquent\Models\Website;

trait BelongsToWebsite
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function website()
    {
        return $this->belongsTo(Website::class, $this->getWebsiteKeyColumn());
    }

    /**
     * Get the name of the "website key" column.
     *
     * @return string
     */
    protected function getWebsiteKeyColumn()
    {
        return 'website_id';
    }
}
