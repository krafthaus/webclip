<?php

namespace KraftHaus\WebClip\Resources\Elements\Typography;

use KraftHaus\WebClip\Resources\Elements\Element;

class HeadingElement extends Element
{
    /**
     * The element title.
     *
     * @var string
     */
    public static $title = 'Heading';

    /**
     * The element's class list.
     *
     * @var array
     */
    protected $classList = [
        'b-heading',
    ];

    /**
     * The path to the elements view.
     *
     * @var string
     */
    protected $view = 'webclip::elements.typography.heading';
}
