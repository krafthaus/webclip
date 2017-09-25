<?php

namespace KraftHaus\WebClip\Resources\Elements\Layout;

use KraftHaus\WebClip\Resources\Elements\Element;

class ColumnElement extends Element
{
    /**
     * The element title.
     *
     * @var string
     */
    public static $title = 'Column';

    /**
     * The element's class list.
     *
     * @var array
     */
    protected $classList = [
        'b-col',
        'b-col-sm-12 b-col-6'
    ];

    /**
     * The path to the elements view.
     *
     * @var string
     */
    protected $view = 'webclip::elements.layout.column';
}
