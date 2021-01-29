<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait Likable
{
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function like()
    {
        $like = Like::where('user_id', auth()->id())
            ->where('comment_id', $this->id)
            ->first();

        if ($like) {
            $like->delete();

            return;
        }

        Like::create([
            'user_id' => auth()->id(),
            'comment_id' => $this->id,
            'liked' => true,
        ]);

        $this->likes_count = $this->likesCount();

        $this->save();
    }

    public function likesCount()
    {
        return Like::where('comment_id', $this->id)->where('liked', true)->count();
    }

    public function isLikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('comment_id', $this->id)
            ->where('liked', true)
            ->count();
    }
}
