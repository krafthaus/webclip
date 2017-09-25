<?php

namespace KraftHaus\WebClip\Resources\Elements\Layout;

use KraftHaus\WebClip\Resources\Elements\Element;

class SectionElement extends Element
{
    /**
     * The element title.
     *
     * @var string
     */
    public static $title = 'Section';

    /**
     * The element's class list.
     *
     * @var array
     */
    protected $classList = [
        'b-section',
    ];

    /**
     * The path to the elements view.
     *
     * @var string
     */
    protected $view = 'webclip::elements.layout.section';
}
