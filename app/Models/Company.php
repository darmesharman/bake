<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use PhpParser\Node\Expr\FuncCall;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];


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

    public function getImageAttribute()
    {
        return $this->company_image;
    }

    public function additional_phone_numbers()
    {
        return $this->hasMany(AdditionalPhoneNumber::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function profileImages()
    {
        return $this->hasMany(Image::class)->where('profile', true);
    }

    public function galleryImages()
    {
        return $this->hasMany(Image::class)->where('gallery', true);
    }

    public function hasProfile(Image $image)
    {
        return $this->profileImages->contains($image);
    }

    public function hasGallery(Image $image)
    {
        return $this->galleryImages->contains($image);
    }
}
