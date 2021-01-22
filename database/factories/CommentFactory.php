<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->text,
            'rating' => $this->faker->numberBetween(0, 10),
            'user_id' => User::factory(),
            'company_id' => Company::factory(),
        ];
    }
}
