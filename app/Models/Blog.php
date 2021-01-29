<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = []; //Poka chto patom ozgertem

    public function blogImages()
    {
        return $this->hasMany(BlogImage::class);
    }

    public function blogImage()
    {
        return $this->hasOne(BlogImage::class)->where('blog', true);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
