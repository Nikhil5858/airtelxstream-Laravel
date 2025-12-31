<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Genre;
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

        return view('frontend.dashboard', compact('banners','genres','otts'));
    }
}
