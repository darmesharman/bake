<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MicroDistrictCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static $wrap = 'districts';

    public function toArray($request)
    {
        return [
            'districts' => MicroDistrictResource::collection($this->collection),
        ];
    }
}
