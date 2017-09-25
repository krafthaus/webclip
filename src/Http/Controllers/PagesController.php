<?php

namespace KraftHaus\WebClip\Http\Controllers;

use Illuminate\Routing\Controller;
use KraftHaus\WebClip\Eloquent\Models\Page;
use KraftHaus\WebClip\Eloquent\Models\Website;
use KraftHaus\WebClip\Contracts\Page\Repository;
use KraftHaus\WebClip\Http\Resources\PageResource;
use KraftHaus\WebClip\Http\Requests\Page\StoreRequest;

class PagesController extends Controller
{
    /**
     * The page repository implementation.
     *
     * @var \KraftHaus\WebClip\Contracts\Page\Repository
     */
    protected $pages;

    /**
     * Create a new pages controller instance.
     *
     * @param  \KraftHaus\WebClip\Contracts\Page\Repository $pages
     * @return void
     */
    public function __construct(Repository $pages)
    {
        $this->pages = $pages;
    }

    /**
     * Get all pages.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Website $website
     * @return \Illuminate\Http\Response
     */
    public function index(Website $website)
    {
        return PageResource::collection(
            $this->pages->getAllPagesByWebsite($website)
        );
    }

    /**
     * Show a single page.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Website $website
     * @param  \KraftHaus\WebClip\Eloquent\Models\Page $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Website $website, Page $page)
    {
        return new PageResource($page);
    }

    /**
     * Create a new page.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Website $website
     * @param  \KraftHaus\WebClip\Http\Requests\Page\StoreRequest $request
     * @return \KraftHaus\WebClip\Http\Resources\PageResource
     */
    public function store(Website $website, StoreRequest $request)
    {
        return new PageResource(
            $this->pages->createPage($website, $request->all())
        );
    }
}
