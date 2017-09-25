<?php

namespace KraftHaus\WebClip\Eloquent\Models;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use KraftHaus\WebClip\Eloquent\BelongsToWebsite;

class Element extends Model
{
    use NodeTrait, BelongsToWebsite;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
    ];

    /**
     * The relationships that should be touched on save.
     *
     * @var array
     */
    protected $touches = [
        'page',
    ];

    /**
     * The attributes that should be visible in serialization.
     *
     * @var array
     */
    protected $visible = [
        'id', 'element_type', 'content', 'children',
    ];

    /**
     * The page relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    /**
     * Dispatch the element rendering.
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        $type = $this->getAttribute('element_type');

        $namespace = config('webclip.elements')[$type];

        $instance = new $namespace($this);

        return $instance->render();
    }

    /**
     * Retrict the tree scope by website and page.
     *
     * @return array
     */
    protected function getScopeAttributes()
    {
        return [
            'website_id', 'page_id',
        ];
    }
}
