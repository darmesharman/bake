<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait Likable
{
    public function isLikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('comment_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('comment_id', $this->id)
            ->where('liked', false)
            ->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->id(),
            ],
            [
                'liked' => $liked,
            ]
        );
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
