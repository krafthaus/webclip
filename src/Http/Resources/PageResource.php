<?php

namespace KraftHaus\WebClip\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PageResource extends Resource
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
            'uuid' => $this->uuid,
            'website_id' => $this->website_id,
            'name' => $this->name,
            'slug' => $this->slug,
            'url' => $this->url,
            'depth' => $this->depth,
            'is_folder' => $this->is_folder,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
