<?php

namespace KraftHaus\WebClip\Http\Controllers;

use Illuminate\Routing\Controller;
use KraftHaus\WebClip\Eloquent\Models\Website;
use KraftHaus\WebClip\Contracts\Website\Repository;
use KraftHaus\WebClip\Http\Resources\WebsiteResource;

class WebsitesController extends Controller
{
    /**
     * The page repository implementation.
     *
     * @var \KraftHaus\WebClip\Contracts\Website\Repository
     */
    protected $websites;

    /**
     * Create a new websites controller instance.
     *
     * @param  \KraftHaus\WebClip\Contracts\Website\Repository $websites
     * @return void
     */
    public function __construct(Repository $websites)
    {
        $this->websites = $websites;
    }

    /**
     * Get all websites.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return WebsiteResource::collection(
            $this->websites->getAllActiveWebsites()
        );
    }

    /**
     * Show a single website.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Website $website
     * @return \KraftHaus\WebClip\Http\Resources\WebsiteResource
     */
    public function show(Website $website)
    {
        return new WebsiteResource($website);
    }
}
