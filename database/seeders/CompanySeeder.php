<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Image;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile_image = Image::factory()->profile();
        $gallery_image = Image::factory()->gallery();

        Company::factory()
            ->count(3)
            ->has($profile_image)
            ->has($gallery_image)
            ->create();

        Company::all()->each(function ($company, $key) {
            $company->rating = $company->rating();
            $company->save();
        });
    }
}
