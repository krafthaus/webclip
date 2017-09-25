<?php

namespace KraftHaus\WebClip\Http\Controllers;

use Illuminate\Routing\Controller;
use KraftHaus\WebClip\Eloquent\Models\Page;
use KraftHaus\WebClip\Eloquent\Models\Website;
use KraftHaus\WebClip\Contracts\Element\Repository;

class PageElementsController extends Controller
{
    /**
     * The element repository implementation.
     */
    protected $elements;

    /**
     * Create a new page elements controller instance.
     *
     * @param  \KraftHaus\WebClip\Contracts\Element\Repository $elements
     * @return void
     */
    public function __construct(Repository $elements)
    {
        $this->elements = $elements;
    }

    /**
     * Get all elements by page.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Website $website
     * @param  \KraftHaus\WebClip\Eloquent\Models\Page $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Website $website, Page $page)
    {
        $elements = $this->elements->getAllElementsByPage($page);

        return response()->json([
            'data' => $elements->toTree(),
        ]);
    }
}
