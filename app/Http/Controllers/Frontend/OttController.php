<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OttProvider;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;

class OttController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $otts = OttProvider::query()
            ->where('is_active', true)
            ->with(['movies' => function ($q) use ($userId) {
                $q->withCount([
                    'watchlists as in_watchlist' => function ($w) use ($userId) {
                        if ($userId) {
                            $w->where('user_id', $userId);
                        }
                    },
                ]);
            }])
            ->get()
            ->filter(fn ($ott) => $ott->movies->isNotEmpty());

        return view('frontend.ott.ott', compact('otts'));
    }

    public function show(OttProvider $ott)
    {
        $userId = Auth::id();

        $movies = Movie::query()
            ->where('ott_id', $ott->id)
            ->withCount([
                'watchlists as in_watchlist' => function ($q) use ($userId) {
                    if ($userId) {
                        $q->where('user_id', $userId);
                    }
                },
            ])
            ->get();

        return view('frontend.ott.show', compact('ott', 'movies'));
    }
}
