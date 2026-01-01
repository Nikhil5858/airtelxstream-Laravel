<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\Movie;
use App\Models\Seasons;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    public function show(Movie $movie)
    {
        $userId = Auth::id();

        // load genre + watchlist flag
        $movie->load('genre');

        $movie->in_watchlist = $movie->watchlists()
            ->where('user_id', $userId)
            ->exists();

        // cast
        $cast = $movie->cast()
            ->join('castrole', 'castrole.id', '=', 'castcontent.cast_roles_id')
            ->select(
                'cast.*',
                'castrole.name as role_name'
            )
            ->orderBy('cast.name')
            ->get();

        $seasons = collect();
        $episodes = collect();

        if ($movie->type === 'series') {
            $seasons = Seasons::where('movie_id', $movie->id)
                ->orderBy('season_number', 'asc')
                ->get();

            $episodes = Episode::whereIn(
                'season_id',
                $seasons->pluck('id')
            )
                ->orderBy('season_id', 'asc')
                ->orderBy('episode_number', 'asc')
                ->get();

        }

        return view('frontend.movie', compact('movie', 'cast', 'seasons', 'episodes'));
    }
}
