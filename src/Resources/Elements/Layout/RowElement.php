<?php

namespace KraftHaus\WebClip\Resources\Elements\Layout;

use KraftHaus\WebClip\Resources\Elements\Element;

class RowElement extends Element
{
    /**
     * The element title.
     *
     * @var string
     */
    public static $title = 'Row';

    /**
     * The element's class list.
     *
     * @var array
     */
    protected $classList = [
        'b-row',
    ];

    /**
     * The path to the elements view.
     *
     * @var string
     */
    protected $view = 'webclip::elements.layout.row';
}
