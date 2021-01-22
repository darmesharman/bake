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
            $user = User::all()->random();
            $comment = Comment::all()->random();

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
        }
    }
}
