<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\HomepageSection;
use App\Models\Movie;
use App\Models\OttProvider;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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
                }
            ])
            ->orderByDesc('id')
            ->get();

        $genres = Genre::query()
            ->orderBy('name')
            ->get();

        $otts = OttProvider::query()
            ->where('is_active', true)
            ->get();

        $newReleases = Movie::query()
            ->where('is_new_release', true)
            ->withCount([
                'watchlists as in_watchlist' => function ($q) use ($userId) {
                    if ($userId) {
                        $q->where('user_id', $userId);
                    }
                }
            ])
            ->orderByDesc('created_at')
            ->limit(12)
            ->get();

        $sections = HomepageSection::query()
            ->where('is_active', true)
            ->orderBy('position')
            ->with([
                'movies' => function ($q) use ($userId) {
                    $q->withCount([
                        'watchlists as in_watchlist' => function ($w) use ($userId) {
                            if ($userId) {
                                $w->where('user_id', $userId);
                            }
                        }
                    ]);
                }
            ])
            ->get();
            
        return view('frontend.dashboard', compact('banners','genres','otts','newReleases','sections'));
    }
}
