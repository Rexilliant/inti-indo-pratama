<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 20; $i++) {
            Product::create([
                'code' => 'PRD-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'name' => $faker->words(3, true),
                'description' => $faker->paragraph(),
            ]);
        }
    }
}
