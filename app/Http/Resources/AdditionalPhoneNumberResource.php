<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdditionalPhoneNumberResource extends JsonResource
{
    public static $wrap = 'additionalPhoneNumber';
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
            'phone_number' => $this->phone_number,
            'company' => new CompanyResource($this->company),
        ];
    }
}
