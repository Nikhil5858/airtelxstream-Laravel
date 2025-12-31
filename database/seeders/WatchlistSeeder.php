<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Watchlist;
use App\Models\Users;
use App\Models\Movie;

class WatchlistSeeder extends Seeder
{
    public function run(): void
    {
        $user = Users::first();
        $movies = Movie::take(3)->get();

        if (! $user || $movies->isEmpty()) {
            return;
        }

        foreach ($movies as $movie) {
            Watchlist::firstOrCreate([
                'user_id'  => $user->id,
                'movie_id' => $movie->id,
            ]);
        }
    }
}
