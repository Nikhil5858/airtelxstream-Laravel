<?php

namespace Database\Seeders;

use App\Models\Episode;
use Illuminate\Database\Seeder;

class EpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Episode::insert(
        [
            'season_id' => 1,
            'episode_number' => 1,
            'title' => 'Episode 1',
            'video_url' => 'abc',
            'poster_img' => 'xyz',
        ],
        [
            'season_id' => 1,
            'episode_number' => 2,
            'title' => 'Episode 2',
            'video_url' => 'abc',
            'poster_img' => 'xyz',
        ],
        [
            'season_id' => 1,
            'episode_number' => 3,
            'title' => 'Episode 3',
            'video_url' => 'abc',
            'poster_img' => 'xyz',
        ]);
    }
}
