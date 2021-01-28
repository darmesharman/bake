<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Status;
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
            BlogSeeder::class,
        ]);
    }
}
