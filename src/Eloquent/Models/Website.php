<?php

namespace KraftHaus\WebClip\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use KraftHaus\WebClip\Eloquent\Activatable;

class Website extends Model
{
    use Activatable;

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
        'uuid', 'name', 'domain', 'force_https', 'css_rules',
    ];

    /**
     * The relationship counts that should be eager loaded on every query.
     *
     * @var array
     */
    protected $withCount = [
        'pages',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'css_rules' => 'array',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'css_rules',
    ];

    /**
     * The collections relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collections()
    {
        return $this->hasMany(Collection::class);
    }

    /**
     * The elements relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function elements()
    {
        return $this->hasMany(Element::class, 'website_id');
    }

    /**
     * The pages relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pages()
    {
        return $this->hasMany(Page::class, 'website_id');
    }

    /**
     * Force strip the scheme from the domain.
     *
     * @param  string $domain
     * @return void
     */
    public function setDomainAttribute($domain)
    {
        $domain = preg_replace('/^https?:\/\//', '', strtolower($domain));

        $this->attributes['domain'] = $domain;
    }
}
