<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

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
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->email,
            'phone_number' => $phone_number,
            'phone_verified_at' => now(),
            'phone_verification_send' => now(),
            'city' => $this->faker->city,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}
