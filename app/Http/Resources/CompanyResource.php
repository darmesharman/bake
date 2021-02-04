<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    public static $wrap = 'company';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $resource = [
            'id' => $this->id,
            'name' => $this->name,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'sub_category' => new SubCategoryResource($this->whenLoaded('subCategory')),
            'city' => new CityResource($this->whenLoaded('city')),
            'district' => new DistrictResource($this->whenLoaded('district')),
            'micro_district' => new MicroDistrictResource($this->whenLoaded('microDistrict')),
            'description' => $this->description,
            'short_description' => $this->short_description,
            'site' => $this->site,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'views' => $this->views,
            'rating' => $this->rating,
            'additional_phone_numbers' => new AdditionalPhoneNumberCollection($this->whenLoaded('additional_phone_numbers')),
            'comments' => new CommentCollection($this->whenLoaded('comments')),
            'company_images' => new CompanyImageCollection($this->whenLoaded('companyImages')),
            'profile_image' => $this->profile_image,
        ];

        if ($this->company_images_count) {
            $resource['company_images_count'] = $this->company_images_count;
        }

        return $resource;
    }
}
