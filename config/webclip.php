<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Base domain setting
    |--------------------------------------------------------------------------
    |
    | This is used for communication between browser frames. When both
    | frames have the window.domain property set to the same values,
    | the browser accepts communication between those frames.
    */

    'domain' => env('APP_DOMAIN', 'localhost'),

    /*
    |--------------------------------------------------------------------------
    | Role definitions
    |--------------------------------------------------------------------------
    |
    | ...Lorem Ipsum...
    */
    'roles' => [
        'default' => 'member',
        'options' => ['member', 'owner'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Fields
    |--------------------------------------------------------------------------
    |
    | These are all the registered fields.
    */

    'fields' => [

        'color' => KraftHaus\WebClip\Resources\Fields\ColorField::class,
        'data-time' => KraftHaus\WebClip\Resources\Fields\DateTimeField::class,
        'image' => KraftHaus\WebClip\Resources\Fields\ImageField::class,
        'link' => KraftHaus\WebClip\Resources\Fields\LinkField::class,
        'number' => KraftHaus\WebClip\Resources\Fields\NumberField::class,
        'option' => KraftHaus\WebClip\Resources\Fields\OptionField::class,
        'reference' => KraftHaus\WebClip\Resources\Fields\ReferenceField::class,
        'text' => KraftHaus\WebClip\Resources\Fields\TextField::class,
        'video' => KraftHaus\WebClip\Resources\Fields\VideoField::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Elements
    |--------------------------------------------------------------------------
    |
    | These are all the registered elements.
    */

    'elements' => [

        /*
         * Basic elements...
         */
        'basic.button' => KraftHaus\WebClip\Resources\Elements\Basic\ButtonElement::class,
        'basic.div' => KraftHaus\WebClip\Resources\Elements\Basic\DivElement::class,
        'basic.link' => KraftHaus\WebClip\Resources\Elements\Basic\LinkElement::class,
        'basic.list' => KraftHaus\WebClip\Resources\Elements\Basic\ListElement::class,
        'basic.list-item' => KraftHaus\WebClip\Resources\Elements\Basic\ListItemElement::class,

        /*
         * Form elements...
         */
        'form.checkbox' => KraftHaus\WebClip\Resources\Elements\Form\CheckboxElement::class,
        'form.form' => KraftHaus\WebClip\Resources\Elements\Form\FormElement::class,
        'form.input' => KraftHaus\WebClip\Resources\Elements\Form\InputElement::class,
        'form.label' => KraftHaus\WebClip\Resources\Elements\Form\LabelElement::class,
        'form.radio' => KraftHaus\WebClip\Resources\Elements\Form\RadioElement::class,
        'form.select' => KraftHaus\WebClip\Resources\Elements\Form\SelectElement::class,
        'form.textarea' => KraftHaus\WebClip\Resources\Elements\Form\TextareaElement::class,

        /*
         * Layout elements...
         */
        'layout.column' => KraftHaus\WebClip\Resources\Elements\Layout\ColumnElement::class,
        'layout.row' => KraftHaus\WebClip\Resources\Elements\Layout\RowElement::class,
        'layout.section' => KraftHaus\WebClip\Resources\Elements\Layout\SectionElement::class,

        /*
         * Media elements...
         */
        'media.image' => KraftHaus\WebClip\Resources\Elements\Media\ImageElement::class,
        'media.video' => KraftHaus\WebClip\Resources\Elements\Media\VideoElement::class,

        /*
         * Typography elements...
         */
        'typography.heading' => KraftHaus\WebClip\Resources\Elements\Typography\HeadingElement::class,
        'typography.paragraph' => KraftHaus\WebClip\Resources\Elements\Typography\ParagraphElement::class,

    ],

];
