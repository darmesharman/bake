<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public $guarded = [];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }

    public function hasBlogs($blog)
    {
        return $this->blogs->contains($blog);
    }
}
