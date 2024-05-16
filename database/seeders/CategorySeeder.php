<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brandNames = ['لوازم آرایشی', 'مراقبت پوست', 'مراقبت و زیبایی مو', 'عطر و ادکلن'];
        foreach ($brandNames as $brandName) {
            Category::create([
                "title" => $brandName,
                "category_id" => 0
            ]);
        }

        $brandNames = ['آرایش صورت', 'آرایش چشم', 'آرایش ابرو', 'بهداشت و زیبایی ناخن', 'ابزار آرایشی'];
        foreach ($brandNames as $brandName) {
            Category::create([
                "title" => $brandName,
                "category_id" => 1
            ]);
        }

        $brandNames = ['کرم ، مرطوب‌کننده و نرم‌کننده', 'پاک کننده صورت', 'تونر', 'مراقبت بدن'];
        foreach ($brandNames as $brandName) {
            Category::create([
                "title" => $brandName,
                "category_id" => 2
            ]);
        }

        $brandNames = ['شامپو و مراقبت مو', 'آرایش مو'];
        foreach ($brandNames as $brandName) {
            Category::create([
                "title" => $brandName,
                "category_id" => 3
            ]);
        }

        $brandNames = ['عطر و ادکلن زنانه', 'عطر و ادکلن مردانه', 'بادی اسپلش', 'عطر جیبی'];
        foreach ($brandNames as $brandName) {
            Category::create([
                "title" => $brandName,
                "category_id" => 4
            ]);
        }

        $brandNames = ['اورجینال', 'شرکتی'];
        foreach ($brandNames as $brandName) {
            Category::create([
                "title" => $brandName,
                "category_id" => 16
            ]);
        }

        $brandNames = ['اورجینال', 'شرکتی'];
        foreach ($brandNames as $brandName) {
            Category::create([
                "title" => $brandName,
                "category_id" => 17
            ]);
        }

    }
}
