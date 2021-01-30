<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use PhpParser\Node\Expr\FuncCall;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'sub_category_id',
        'city_id',
        'district_id',
        'micro_district_id',
        'company_image',
        'description',
        'short_description',
        'site',
        'email',
        'phone_number',
        'company_links',
    ];


    public function contacts()
    {
        return $this->belongsToMany(Contact::class);
    }

    public function hasContact(Contact $contact)
    {
        return $this->contacts->contains($contact);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function hasCategory(Category $category)
    {
        return $this->category->id == $category->id;
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function hasCity(City $city)
    {
        return $this->city->id == $city->id;
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function microDistrict()
    {
        return $this->belongsTo(MicroDistrict::class);
    }

    public function additional_phone_numbers()
    {
        return $this->hasMany(AdditionalPhoneNumber::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function ratingCount()
    {
        return number_format($this->comments->avg('rating'), 1);
    }

    public function companyImages()
    {
        return $this->hasMany(CompanyImage::class);
    }

    public function hasProfile(CompanyImage $image)
    {
        return $this->profileCompanyImages->contains($image);
    }

    public function profileCompanyImages()
    {
        return $this->hasMany(CompanyImage::class)->where('profile', true);
    }

    public function hasGallery(CompanyImage $image)
    {
        return $this->galleryImages->contains($image);
    }

    public function galleryImages()
    {
        return $this->hasMany(CompanyImage::class)->where('gallery', true);
    }

    public function socialMedias()
    {
        return $this->belongsToMany(SocialMediaLink::class);
    }

    public function companySocialMediaLinks()
    {
        return $this->hasMany(SocialMediaLink::class)->where('company_id', $this->id);
    }

    public function companySchedule()
    {
        return $this->hasOne(CompanySchedule::class);
    }
}
