<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'linking' => $this->linking,
            'image_thumb' => $this->image_thumb,
            'contents' => $this->contents,
            'createAt' => $this->createAt,
            'updateAt' => $this->updateAt,
        ];
    }
}
