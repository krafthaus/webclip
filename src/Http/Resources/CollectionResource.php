<?php

namespace KraftHaus\WebClip\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class CollectionResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'website_id' => $this->website_id,
            'name' => $this->name,
            'plural_name' => $this->plural_name,
            'singular_name' => $this->singular_name,
            'slug' => $this->slug,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
