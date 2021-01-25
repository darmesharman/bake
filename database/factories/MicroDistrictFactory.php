<?php

namespace Database\Factories;

use App\Models\District;
use App\Models\MicroDistrict;
use Illuminate\Database\Eloquent\Factories\Factory;

class MicroDistrictFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MicroDistrict::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'district_id' => District::factory(),
        ];
    }
}
