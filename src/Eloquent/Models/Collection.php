<?php

namespace KraftHaus\WebClip\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Support\Responsable;
use KraftHaus\WebClip\Eloquent\BelongsToWebsite;

class Collection extends Model implements Responsable
{
    use BelongsToWebsite;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'name', 'plural_name', 'singular_name', 'slug',
    ];

    /**
     * The relationship counts that should be eager loaded on every query.
     *
     * @var array
     */
    protected $withCount = [
        'entries',
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
     * The fields relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fields()
    {
        return $this->hasMany(CollectionField::class, 'collection_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entries()
    {
        return $this->hasMany(CollectionEntry::class, 'collection_id');
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        dd($request->get('resource'));
        // TODO: Implement toResponse() method.
    }
}
