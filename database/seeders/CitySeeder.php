<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\District;
use App\Models\MicroDistrict;
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
                'Каскелен' => ['kaskelen'],
            ],
            'Алматы' => [
                'Алатауский' => ['something alatau'],
                'Алмалинский' => ['something almali'],
                'Ауэзовский' => ['something auez'],
                'Бостандыкский' => ['something bostan'],
                'Жетысуский' => ['something zhetisy'],
                'Медеуский' => ['something medeu'],
                'Наурызбайский' => ['something nauryz'],
                'Турксибский' => ['something turki'],
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

            foreach ($districts as $district => $micro_districts) {
                // if districts exists then go on
                // (it is for not creating same districts in one city)
                if (District::where('name', $district)
                        ->where('city_id', $city->id)
                        ->first()
                    ) {
                    continue;
                }

                // otherwise create new one
                $district = District::factory(['name' => $district])
                    ->for($city)
                    ->create();

                foreach ($micro_districts as $micro_district) {
                    // if micro$micro_districts exists then go on
                    // (it is for not creating same micro$micro_districts in one city)
                    if (MicroDistrict::where('name', $micro_district)
                            ->where('district_id', $district->id)
                            ->first()
                        ) {
                        continue;
                    }

                    // otherwise create new one
                    MicroDistrict::factory(['name' => $micro_district])
                        ->for($district)
                        ->create();
                }
            }
        }
    }
}
