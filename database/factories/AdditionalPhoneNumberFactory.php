<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\AdditionalPhoneNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdditionalPhoneNumberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdditionalPhoneNumber::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // generate random kz phone number
        $phone_code = ['01', '02', '47', '77'];
        $rand_phone_code = $phone_code[array_rand($phone_code, 1)];
        $phone_number = '77' . $rand_phone_code . $this->faker->unique()->randomNumber(7);

        return [
            'phone_number' => $phone_number,
            'company_id' => Company::factory(),
        ];
    }
}
