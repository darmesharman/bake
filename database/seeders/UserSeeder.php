<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('phone_number', '77026651625')->first()) {
            User::factory(['email' => 'arman@gmail.com', 'phone_number' => '77026651625'])->create();
        }

        User::factory()->count(2)->create();
    }
}
