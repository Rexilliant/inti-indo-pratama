<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 20; $i++) {
            Faq::create([
                'question' => rtrim($faker->sentence(), '.') . '?',
                'answer' => $faker->paragraph(),
                'status' => 'published',
            ]);
        }
    }
}
