<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 20; $i++) {
            Testimonial::create([
                'name' => $faker->name(),
                'country' => 'Indonesia',
                'province' => $faker->state(),
                'city' => $faker->city(),
                'comment' => $faker->paragraph(),
                'status' => $faker->randomElement(['published', 'not_published']),
            ]);
        }
    }
}
