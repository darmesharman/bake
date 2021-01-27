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

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function hasCity(City $city)
    {
        return $this->city->id == $city->id;
    }

    public function additional_phone_numbers()
    {
        return $this->hasMany(AdditionalPhoneNumber::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function rating()
    {
        return number_format($this->comments->avg('rating'), 1);
    }

    public function companyImages()
    {
        return $this->hasMany(CompanyImage::class);
    }

    public function hasProfile(CompanyImage $image)
    {
        return $this->profileImages->contains($image);
    }

    public function profileImages()
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
}
