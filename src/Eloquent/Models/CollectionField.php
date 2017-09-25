<?php

namespace KraftHaus\WebClip\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use KraftHaus\WebClip\Eloquent\BelongsToWebsite;

class CollectionField extends Model
{
    use BelongsToWebsite;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array',
        'is_required' => 'bool',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'website_id', 'collection_id', 'created_at', 'updated_at',
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
}
