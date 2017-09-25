<?php

namespace KraftHaus\WebClip\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use KraftHaus\WebClip\Eloquent\Activatable;
use KraftHaus\WebClip\Eloquent\BelongsToWebsite;

class CollectionEntry extends Model
{
    use BelongsToWebsite, Activatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'values', 'values.field',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'website_id', 'collection_id',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'activated_at',
    ];

    /**
     * The relationships that should be touched on save.
     *
     * @var array
     */
    protected $touches = [
        'collection',
    ];

    /**
     * The collection relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function collection()
    {
        return $this->belongsTo(Collection::class, 'collection_id');
    }

    /**
     * The collection entries relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function values()
    {
        return $this->hasMany(CollectionValue::class, 'collection_entry_id');
    }
}
