<?php

namespace Database\Seeders;

use App\Models\BlogImage;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogImage::factory()->count(5)->create();
    }
}
