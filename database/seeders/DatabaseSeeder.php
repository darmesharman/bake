<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Status;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            CitySeeder::class,
            CompanySeeder::class,
            CommentSeeder::class,
            LikeSeeder::class,
            TagSeeder::class,
            BlogSeeder::class,
        ]);

        $blogs = Blog::all();
        $tags = Tag::all();

        $blogs->each(function ($blog) use ($tags) {
            $blog->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
