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
        $company_images = CompanyImage::factory(5);

        Company::factory()
            ->count(3)
            ->has($company_images)
            ->create();

        foreach (Company::all() as $company) {
            $company->rating = $company->ratingCount();
            $company->save();
        }
    }
}
