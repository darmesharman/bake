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
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => 'arman@gmail.com',
            'phone_number' => '+77026651625',
            'phone_verification_send' => now(),
            'city' => $this->faker->city,
            'password' => bcrypt('arman123'), // password
            'remember_token' => Str::random(10),
        ];
    }
}
