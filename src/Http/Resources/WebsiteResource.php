<?php

namespace KraftHaus\WebClip\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class WebsiteResource extends Resource
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
            'name' => $this->name,
            'domain' => $this->domain,
            'activated_at' => $this->activated_at->toDateTimeString(),
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
