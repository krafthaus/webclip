<?php

namespace KraftHaus\WebClip\Eloquent\Models;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Support\Responsable;
use KraftHaus\WebClip\Eloquent\BelongsToWebsite;
use KraftHaus\WebClip\Http\Responses\PageResponse;

class Page extends Model implements Responsable
{
    use NodeTrait, BelongsToWebsite;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'is_folder',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        '_lft', '_rgt',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_folder' => 'bool',
    ];

    /**
     * The relationships that should be touched on save.
     *
     * @var array
     */
    protected $touches = [
        'website',
    ];

    /**
     * The elements relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function elements()
    {
        return $this->hasMany(Element::class, 'page_id');
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        return new PageResponse($request, $this);
    }

    /**
     * Get the full URL to the page.
     *
     * @return null|string
     */
    public function getUrlAttribute()
    {
        if ($this->getAttribute('name') === '404') {
            return null;
        }

        $slug = '/'.ltrim($this->getAttribute('slug'), '/');

        return "http://{$this->website->domain}{$slug}";
    }

    /**
     * Retrict the tree scope by website.
     *
     * @return array
     */
    protected function getScopeAttributes()
    {
        return [
            'website_id',
        ];
    }
}
