<?php

namespace KraftHaus\WebClip\Contracts\Website;

interface Repository
{
    /**
     * Get all active websites.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAllActiveWebsites();

    /**
     * Only get the non-active websites.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getOnlyDeactivatedWebsites();

    /**
     * Save a new model and return the instance.
     *
     * @param  array $attributes
     * @return \Illuminate\Database\Eloquent\Model|$this
     */
    public function createWebsite(array $attributes = []);

    /**
     * Get a website by domain.
     *
     * @param  string $domain
     * @return \KraftHaus\WebClip\Eloquent\Models\Website|null
     */
    public function getWebsiteByDomain($domain);
}
