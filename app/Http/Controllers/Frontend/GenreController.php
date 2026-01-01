<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\HomepageSection;
use Illuminate\Support\Facades\Auth;

class GenreController extends Controller
{
    public function show(Genre $genre)
    {
        $userId = Auth::id();

        $sections = HomepageSection::query()
            ->where('is_active', true)
            ->with(['movies' => function ($q) use ($genre, $userId) {
                $q->where('genre_id', $genre->id)
                  ->withCount([
                      'watchlists as in_watchlist' => function ($w) use ($userId) {
                          if ($userId) {
                              $w->where('user_id', $userId);
                          }
                      }
                  ])
                  ->orderBy('homepage_section_movies.position');
            }])
            ->get()
            ->filter(fn ($s) => $s->movies->isNotEmpty());

        return view('frontend.genre', compact('genre', 'sections'));
    }
}
