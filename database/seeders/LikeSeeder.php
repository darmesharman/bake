<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Like;
use App\Models\User;
use App\Models\Comment;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 50; $i++) {
            // if User not empty then take of the user
            // otherwise create new one
            $user = User::all()->isNotEmpty() ? User::all()->random() : User::factory()->create();
            // if Comment not empty then take of the comment
            // otherwise create new one
            $comment = Comment::all()->isNotEmpty() ? Comment::all()->random() : Comment::factory()->create();

            if (Like::where('user_id', $user->id)
                ->where('comment_id', $comment->id)
                ->first()
            ) {
                continue;
            }

            Like::factory()
                ->for($user)
                ->for($comment)
                ->create();

            $comment->likes = $comment->likesCount();
        }
    }
}
