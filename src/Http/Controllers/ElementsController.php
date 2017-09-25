<?php

namespace KraftHaus\WebClip\Http\Controllers;

use Illuminate\Routing\Controller;
use KraftHaus\WebClip\Contracts\Element\Repository;

class ElementsController extends Controller
{
    /**
     * The element repository implementation.
     *
     * @var \KraftHaus\WebClip\Contracts\Element\Repository
     */
    protected $elements;

    /**
     * Create a new elements controller instance.
     *
     * @param  \KraftHaus\WebClip\Contracts\Element\Repository $elements
     * @return void
     */
    public function __construct(Repository $elements)
    {
        $this->elements = $elements;
    }

    /**
     * Get all elements.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'elements' => $this->elements->getAllElements(),
        ]);
    }
}
