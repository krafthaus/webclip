<?php

namespace KraftHaus\WebClip\Resources\Elements\Typography;

class ParagraphElement
{
    /**
     * The element title.
     *
     * @var string
     */
    public static $title = 'Paragraph';

    /**
     * The element's class list.
     *
     * @var array
     */
    protected $classList = [
        'b-paragraph',
    ];

    /**
     * The path to the element's view.
     *
     * @var string
     */
    protected $view = 'webclip::elements.typography.paragraph';
}
