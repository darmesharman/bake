<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            Comment::factory()
                ->for(Company::all()->random())
                ->for(User::all()->random())
                ->create();
        }
    }
}
