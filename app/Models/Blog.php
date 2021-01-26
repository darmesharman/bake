<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = []; //Poka chto patom ozgertem

    public function images()
    {
        return $this->hasMany(BlogImages::class);
    }

    public function blogImages()
    {
        return $this->hasMany(BlogImages::class)->where('blog', true);
    }
}
