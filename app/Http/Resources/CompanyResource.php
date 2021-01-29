<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public static $wrap = 'companies';

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'rating' => $this->rating,
            // 'contacts' => ContactResource::collection($this->contacts),
            'city'=> new CityResource($this->city),
            'category' => new CategoryResource($this->category),
            // profileImages
            // 'profileimage' => new ImageResource($this->profileImages),
            'short_description'=>$this->short_description,

        ];

    }
}
