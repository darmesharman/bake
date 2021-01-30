<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CompanyImage;
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
        $profile_image = CompanyImage::factory()->profile();
        $gallery_image = CompanyImage::factory()->gallery();

        Company::factory()
            ->count(3)
            ->has($profile_image)
            ->has($gallery_image)
            ->create();

        foreach (Company::all() as $company) {
            $company->rating = $company->ratingCount();
            $company->save();
        }
    }
}
