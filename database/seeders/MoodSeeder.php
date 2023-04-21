<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //seed data
        DB::table('moods')->insert([
            'name' => 'Happy',
            'color' => '#FEC8DF',
        ]);

        DB::table('moods')->insert([
            'name' => 'Sad',
            'color' => '#75CFE0',
        ]);

        DB::table('moods')->insert([
            'name' => 'Angry',
            'color' => '#F5C691',
        ]);

        DB::table('moods')->insert([
            'name' => 'Productive',
            'color' => '#C5E8B4',
        ]);

        DB::table('moods')->insert([
            'name' => 'Normal',
            'color' => '#FFEFC9',
        ]);

        DB::table('moods')->insert([
            'name' => 'Calm',
            'color' => '#BBA1D5',
        ]);
    }
}
