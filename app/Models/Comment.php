<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    use Likable;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    public function likesNumber()
    {
        return Like::where('comment_id', $this->id)->where('liked', true)->count();
    }

    public function dislikesNumber()
    {
        return Like::where('comment_id', $this->id)->where('liked', false)->count();
    }
}
