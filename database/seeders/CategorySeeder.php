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
        $faker = \Faker\Factory::create();

        for($i =1; $i<=10; $i++)
        {
            Category::create([
                "name"=> $faker->firstName,
                "description"=> $faker->text,
                "image"=> 'Category-Image/1.png',
                "status"=> 1,
            ]);
        }

    }
}
