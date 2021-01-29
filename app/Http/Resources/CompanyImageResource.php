<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyImageResource extends JsonResource
{
    public static $wrap = 'company_image';
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
            'name' => $this->name,
            'company' => new CompanyResource($this->whenLoaded('company')),
        ];
    }
}
