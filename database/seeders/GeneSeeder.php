<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genes')->insert([
            ['name' => 'Phin hoạt hình'],
            ['name' => 'Phim ma'],
            ['name' => 'Phim khoa học viễn tưởng'],
            ['name' => 'Phim hài'],
            ['name' => 'Phim tình cảm']
        ]);
    }
}
