<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\OttProvider;
use App\Traits\HandlesFileUpload;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    // Traits
    use HandlesFileUpload;

    // LIST MOVIES
    public function index()
    {
        $movies = Movie::with(['genre', 'ott'])->latest()->get();
        $genres = Genre::all();
        $otts = OttProvider::where('is_active', true)->get();

        return view('admin.movie', compact('movies', 'genres', 'otts'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'language' => 'required|string|max:100',
            'release_year' => 'required|integer|min:1900|max:2099',
            'type' => 'required|in:movie,series',
            'genre_id' => 'required|exists:genre,id',
            'ott_id' => 'nullable|exists:ott_providers,id',
        ]);

        $data['poster_url'] = $this->uploadFile($request->file('poster_file'), 'images', 'poster');
        $data['banner_url'] = $this->uploadFile($request->file('banner_file'), 'images', 'banner');
        $data['movie_url'] = $this->uploadFile($request->file('movie_file'), 'videos', 'movie');
        $data['trailer_url'] = $this->uploadFile($request->file('trailer_file'), 'videos', 'trailer');

        $data['is_free'] = $request->boolean('is_free');
        $data['is_new_release'] = $request->boolean('is_new_release');
        $data['is_feature'] = $request->boolean('is_feature');
        $data['is_banner'] = $request->boolean('is_banner');

        Movie::create($data);

        return redirect()->route('admin.movie');
    }

    public function update(Request $request, Movie $movie)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'language' => 'required|string|max:100',
            'release_year' => 'required|integer|min:1900|max:2099',
            'type' => 'required|in:movie,series',
            'genre_id' => 'required|exists:genre,id',
            'ott_id' => 'nullable|exists:ott_providers,id',
        ]);
        $data['poster_url'] = $this->uploadFile($request->file('poster_file'), 'images', 'poster') ?? $movie->getRawOriginal('poster_url');
        $data['banner_url'] = $this->uploadFile($request->file('banner_file'), 'images', 'banner') ?? $movie->getRawOriginal('banner_url');
        $data['movie_url'] = $this->uploadFile($request->file('movie_file'), 'videos', 'movie') ?? $movie->getRawOriginal('movie_url');
        $data['trailer_url'] = $this->uploadFile($request->file('trailer_file'), 'videos', 'trailer') ?? $movie->getRawOriginal('trailer_url');
        $data['is_free'] = $request->boolean('is_free');
        $data['is_new_release'] = $request->boolean('is_new_release');
        $data['is_feature'] = $request->boolean('is_feature');
        $data['is_banner'] = $request->boolean('is_banner');

        $movie->update($data);

        return redirect()->route('admin.movie');
    }

    // DELETE MOVIE
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('admin.movie');
    }
}
