<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AdditionalPhoneNumberCollection extends ResourceCollection
{
    public static $wrap = 'additionalPhoneNumbers';
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'additionalPhoneNumbers' => $this->collection,
        ];
    }
}
