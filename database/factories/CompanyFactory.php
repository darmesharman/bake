<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\District;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

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

        // get random category
        $category = Category::all()->random();
        // if category have subcategories get one
        // otherwise null
        $sub_category = ($category->subCategories->isNotEmpty())
            ? $category->subCategories->random()
            : null;

        // random city
        $city = City::all()->random();
        // if city have districts get one
        // otherwise null
        $district = ($city->districts->isNotEmpty())
            ? $city->districts->random()
            : null;

        return [
            'name' => $this->faker->company,
            'category_id' => $category->id,
            'sub_category_id' => ($sub_category)
                ? $sub_category->id
                : null,
            'city_id' => $city->id,
            'district_id' => ($district)
                ? $district->id
                : null,
            'company_image' => 'img/default.jpg',
            'description' => $this->faker->text,
            'short_description' => $this->faker->text,
            'site' => $this->faker->url,
            'email' => $this->faker->companyEmail,
            'phone_number' => $phone_number,
        ];
    }
}
