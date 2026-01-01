<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HomepageSection;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;

class SeeAllController extends Controller
{
    public function section(HomepageSection $section)
    {
        $userId = Auth::id();

        $movies = Movie::query()
            ->whereHas('homepageSections', function ($q) use ($section) {
                $q->where('homepage_section_id', $section->id);
            })
            ->withCount([
                'watchlists as in_watchlist' => function ($q) use ($userId) {
                    $q->where('user_id', $userId);
                }
            ])
            ->orderBy('id', 'desc')
            ->get();

        return view('frontend.seeall.show', [
            'title'  => $section->title,
            'movies' => $movies,
        ]);
    }

    public function newReleases()
    {
        $userId = Auth::id();

        $movies = Movie::query()
            ->where('is_new_release', true)
            ->withCount([
                'watchlists as in_watchlist' => function ($q) use ($userId) {
                    $q->where('user_id', $userId);
                }
            ])
            ->orderByDesc('id')
            ->get();

        return view('frontend.seeall.show', [
            'title'  => 'New Releases',
            'movies' => $movies,
        ]);
    }
}
