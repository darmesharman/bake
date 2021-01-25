<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Company;
use App\Models\Like;
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
            // if User not empty then take of the user
            // otherwise create new one
            $user = User::isNotEmpty() ? User::random() : User::factory()->create();
            // if Company not empty then take of the company
            // otherwise create new one
            $company = Company::isNotEmpty() ? Company::random() : Company::factory()->create();

            Comment::factory()
                ->for($user)
                ->for($company)
                ->create();
        }
    }
}
