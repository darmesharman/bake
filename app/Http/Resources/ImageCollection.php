<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ImageCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     */
    public static $wrap = 'company_images';

    public function toArray($request)
    {
        return [
            'company_images' => ImageResource::collection($this->collection),
        ];
    }
}
