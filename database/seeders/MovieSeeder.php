<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::create([
            'title' => 'Super 30',
            'description' => 'Biopic of Anand Kumar',
            'release_year' => 2019,
            'language' => 'Hindi',
            'type' => 'movie',
            'poster_url' => 'super30.webp',
            'banner_url' => 'ott_694f8be9e7007.webp',
            'movie_url' => 'Super30.mp4',
            'trailer_url' => 'Super30.mp4',
            'is_free' => true,
            'is_new_release' => true,
            'genre_id' => 1,
            'ott_id' => 1,
        ]);
    }
}
