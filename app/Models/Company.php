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

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getImageAttribute()
    {
        return $this->company_image;
    }

    public function numbers()
    {
        return $this->hasMany(PhoneNumber::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
