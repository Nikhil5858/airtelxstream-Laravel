<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HomepageSection;
use Illuminate\Support\Facades\Auth;
use App\Models\OttProvider;
use App\Models\Movie;
use App\Models\Genre;


class FreeController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $banners = Movie::query()
            ->where('is_banner', true)
            ->with(['genre'])
            ->withCount([
                'watchlists as in_watchlist' => function ($q) use ($userId) {
                    if ($userId) {
                        $q->where('user_id', $userId);
                    }
                },
            ])
            ->orderByDesc('id')
            ->get();

        $genres = Genre::query()
            ->orderBy('name')
            ->get();

        $otts = OttProvider::query()
            ->where('is_active', true)
            ->get();
        $sections = HomepageSection::query()
            ->where('is_active', true)
            ->orderBy('position')
            ->with([
                'movies' => function ($q) use ($userId) {
                    $q->where('is_free', true)
                        ->withCount([
                            'watchlists as in_watchlist' => function ($w) use ($userId) {
                                if ($userId) {
                                    $w->where('user_id', $userId);
                                }
                            },
                        ]);
                },
            ])
            ->get();

        return view('frontend.free', compact('sections','banners','genres','otts'));
    }
}
