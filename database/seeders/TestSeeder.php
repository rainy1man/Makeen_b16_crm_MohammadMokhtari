<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Factor;
use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Province;
use App\Models\Task;
use App\Models\Team;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        foreach ($users as $user) {
            $province = Province::inRandomOrder()->first();
            // Get a random city belonging to the selected province
            $city = $province->cities()->inRandomOrder()->first();
            $address = $province->province_name . ' ' . $city->city_name . ' ' . fake()->streetAddress();
            Profile::factory()->for($user)->for($province)->for($city)->create([
                'address' => $address,
            ]);
        }
    }
}
