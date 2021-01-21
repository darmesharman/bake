<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\District;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            'Алматинская Область' => [
                'Каскелен',
            ],
            'Алматы' => [
                'Алатауский',
                'Алмалинский',
                'Ауэзовский',
                'Бостандыкский',
                'Жетысуский',
                'Медеуский',
                'Наурызбайский',
                'Турксибский',
            ],
            'Нур-Султан' => [

            ],
        ];

        foreach ($cities as $city => $districts) {
            if (City::where('name', $city)->first()) {
                // if city exists take it
                $city = City::where('name', $city)->first();
            } else {
                // otherwise create new one
                $city = City::factory(['name' => $city])->create();
            }

            foreach ($districts as $district) {
                if (District::where('name', $district)
                        ->where('city_id', $city->id)
                        ->first()
                    ) {
                    continue;
                }

                District::factory(['name' => $district])
                    ->for($city)
                    ->create();
            }
        }
    }
}
