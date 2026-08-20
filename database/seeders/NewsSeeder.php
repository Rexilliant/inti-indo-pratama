<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 20; $i++) {
            $title = $faker->sentence();
            News::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'hook' => $faker->text(100),
                'content' => $faker->paragraphs(3, true),
                'published_at' => $faker->dateTimeBetween('-1 month', 'now'),
            ]);
        }
    }
}
