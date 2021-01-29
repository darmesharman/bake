<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\BlogImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'someimage',
            'path' => 'img/default.jpg',
            'profile' => true,
            'blog_id' => Blog::factory(),
        ];
    }
}
