<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\Factor;
use App\Models\Label;
use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Province;
use App\Models\Task;
use App\Models\Team;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Warranty;
use Illuminate\Database\Seeder;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Create 5 team with specific name
        $teams = ['مدیریت', 'فروش', 'ادمین', 'نشریه', 'پشتیبانی'];
        foreach ($teams as $team) {
            Team::create(["team_name" => $team]);
        }

        // Create 5 label with specific name
        $labels = ['ویژه', 'عادی', 'نقره‌ای', 'برنزی', 'طلایی'];
        foreach ($labels as $label) {
            Label::create(["label_name" => $label]);
        }

        // Create 20 user with random team
        for ($x = 1; $x <= 20; $x++) {
            $team = Team::inRandomOrder()->first();
            $label = Label::inRandomOrder()->first();
            $user = User::factory()->for($team)->hasAttached($label)->create();
            $user->assignRole('user');
        }

        // Create profile for all users
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
        

        // Create 5 brands with specific name
        $brandNames = ['دیور', 'شنل', 'تام فورد', 'کلیر دلالون', 'فراری', 'آزارو', 'کرید', 'ارض الزعفران', 'اسمارت', 'الحمبرا'];
        foreach ($brandNames as $brandName) {
            Brand::create(["brand_name" => $brandName]);
        }

        // Create 2 warranty with specific values
        Warranty::create([
            "title" => 'هفت روز بازگشت',
            "expiration" => 7
        ]);
        Warranty::create([
            "title" => 'یک ماه تعویض',
            "expiration" => 30
        ]);

        // Create 10 products with random brand, categorie, label, warranty
        for ($x = 1; $x <= 10; $x++) {
            $brand = Brand::inRandomOrder()->first();
            $category = Category::inRandomOrder()->first();
            $warranty = Warranty::inRandomOrder()->first();
            $label = Label::inRandomOrder()->first();
            Product::factory()->for($brand)->for($category)->hasAttached($label)->hasAttached($warranty)->create();
        }

        // Create 40 order with random product for random user
        for ($x = 1; $x <= 40; $x++) {
            $users = User::inRandomOrder()->first();
            $products = Product::inRandomOrder()->first();
            Order::factory()->for($users)->hasAttached($products, ['quantity' => fake()->randomElement([1, 2, 3])])->create();
        }

        // Create 40 factor orders
        $orders = Order::all();
        foreach ($orders as $order) {
            Factor::factory()->for($order)->create();
        }

        // create 4 task for random users and 4 task for random teams
        for ($x = 1; $x <= 4; $x++) {
            $users = User::inRandomOrder()->first();
            Task::factory()->for($users, 'taskable')->create();
        }

        for ($x = 1; $x <= 4; $x++) {
            $teams = Team::inRandomOrder()->first();
            Task::factory()->for($teams, 'taskable')->create();
        }

        // create 10 ticket for random user , each ticket has 3 message
        for ($x = 1; $x <= 10; $x++) {
            $users = User::inRandomOrder()->first();
            Ticket::factory()->for($users)->create();
        }

        for ($x = 1; $x <= 30; $x++) {
            $tickets = Ticket::inRandomOrder()->first();
            Message::factory(3)->for($tickets)->create();
        }

    }
}

