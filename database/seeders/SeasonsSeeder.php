<?php

namespace Database\Seeders;

use App\Models\Seasons;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeasonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Seasons::create([
            'season_number' => 1,
            'episode_number' => 5,
            'release_year' => '2025',
            'movie_id' => 1,
            'genre_id' => 1,
            'ott_id' => 1,
        ]);

    }
}
