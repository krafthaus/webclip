<?php

namespace KraftHaus\WebClip\Resources\Elements;

use Illuminate\Database\Eloquent\Model;

abstract class Element
{
    /**
     * The model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * The path to the elements view.
     *
     * @var string
     */
    protected $view;

    /**
     * The elements ID.
     *
     * @var string|null
     */
    protected $elementId = null;

    /**
     * The element's class list.
     *
     * @var array
     */
    protected $classList = [];

    /**
     * Create a new element instance.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get the evaluated element attributes.
     *
     * @return string
     */
    public function attributes()
    {
        $attributes = [
            'id' => 'b-'.$this->model->getKey(),
        ];

        // Only add the class attribute when one or more exists
        // in the classList array. Otherwise, skip this step.
        if (count($this->classList) > 0) {
            $attributes['class'] = implode(' ', $this->classList);
        }

        $attributes = array_map(function ($value, $key) {
            return sprintf('%s="%s"', $key, $value);
        }, $attributes, array_keys($attributes));

        return ' '.implode(' ', $attributes);
    }

    /**
     * Get the elements content.
     *
     * @return string
     */
    public function content()
    {
        return $this->model->content;
    }

    /**
     * Get the evaluated view contents for the given element.
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view($this->view)->with([
            'model' => $this->model,
            'element' => $this,
        ])->render();
    }
}
