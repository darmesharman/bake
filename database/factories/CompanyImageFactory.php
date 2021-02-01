<?php

namespace Database\Factories;

use App\Models\CompanyImage;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'somename',
            'path' => 'img/default.jpg',
            'company_id' => Company::factory(),
        ];
    }
}
