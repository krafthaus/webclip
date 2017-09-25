<?php

namespace KraftHaus\WebClip\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class CollectionValueResource extends Resource
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
            'value' => $this->value,
            'field' => $this->field,
        ];
    }
}
