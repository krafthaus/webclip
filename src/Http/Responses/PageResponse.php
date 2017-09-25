<?php

namespace KraftHaus\WebClip\Http\Responses;

use Illuminate\Http\Request;
use KraftHaus\WebClip\Eloquent\Models\Page;
use Illuminate\Contracts\Support\Responsable;

class PageResponse implements Responsable
{
    /**
     * The Illuminate HTTP request instance.
     *
     * @var Request
     */
    protected $request;

    /**
     * The page model.
     *
     * @var Page
     */
    protected $page;

    /**
     * Create a new page response instance.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \KraftHaus\WebClip\Eloquent\Models\Page $page
     * @return void
     */
    public function __construct(Request $request, Page $page)
    {
        $this->request = $request;
        $this->page = $page;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        $elements = $this->page->elements()
            ->select([
                'id', 'parent_id', 'element_type',
                'content', '_lft', '_rgt',
            ])
            ->defaultOrder()
            ->get()
            ->toTree();

        return view('webclip::page', [
            'elements' => $elements,
            'resource' => $this->page,
        ]);
    }
}
