<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MoiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {

            DB::table('moives')->insert([
                'title' => $faker->text(25),
                'poster' => 'https://tse4.mm.bing.net/th?id=OIP.azmAczqO_NkzTc3tLjIDogHaKl&pid=Api&P=0&h=180',
                'intro' => $faker->text(50),
                'release_date' => $faker->date(),
                'genre_id' => rand(1, 5)
            ]);
        }
    }
}
