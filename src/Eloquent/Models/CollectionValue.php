<?php

namespace KraftHaus\WebClip\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use KraftHaus\WebClip\Eloquent\BelongsToWebsite;

class CollectionValue extends Model
{
    use BelongsToWebsite;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'website_id', 'collection_id', 'collection_field_id', 'collection_entry_id',
        'created_at', 'updated_at',
    ];

    /**
     * The relationships that should be touched on save.
     *
     * @var array
     */
    protected $touches = [
        'collection',
        'entry',
        'field',
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
     * The collection field relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function field()
    {
        return $this->belongsTo(CollectionField::class, 'collection_field_id');
    }

    /**
     * The collection entry relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entry()
    {
        return $this->belongsTo(CollectionEntry::class, 'collection_entry_id');
    }
}
