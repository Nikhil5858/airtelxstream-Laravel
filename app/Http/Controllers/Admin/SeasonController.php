<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\OttProvider;
use App\Models\Seasons;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index()
    {
        $seasons = Seasons::with([
            'movie' => fn ($q) => $q->where('type', 'series'),
            'genre',
            'ott',
        ])
            ->whereHas('movie', fn ($q) => $q->where('type', 'series'))
            ->orderBy('season_number', 'asc')
            ->get();

        $movies = Movie::where('type', 'series')
            ->orderBy('title')
            ->get(['id', 'title', 'genre_id', 'ott_id']);

        return view('admin.season', [
            'seasons' => $seasons,
            'movies' => $movies,
            'genres' => Genre::all(),
            'otts' => OttProvider::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'season_number' => 'required|integer|min:1',
            'episode_number' => 'required|integer|min:1',
            'release_year' => 'required|integer|min:1900|max:2100',
            'genre_id' => 'nullable|exists:genre,id',
            'ott_id' => 'nullable|exists:ott_providers,id',
        ]);

        Seasons::create($data);

        return redirect()->route('admin.season');
    }

    public function update(Request $request, Seasons $season)
    {
        $data = $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'season_number' => 'required|integer|min:1',
            'episode_number' => 'required|integer|min:1',
            'release_year' => 'required|integer|min:1900|max:2100',
            'genre_id' => 'nullable|exists:genre,id',
            'ott_id' => 'nullable|exists:ott_providers,id',
        ]);

        $season->update($data);

        return redirect()->route('admin.season');
    }

    public function destroy(Seasons $season)
    {
        $season->delete();

        return redirect()->route('admin.season');
    }
}
