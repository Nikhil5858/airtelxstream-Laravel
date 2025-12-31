<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WatchlistController extends Controller
{

    public function store(Request $request)
    {
     
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
        ]);

        if (!auth()->check()) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $watchlist = Watchlist::firstOrCreate([
            'user_id' => auth()->id(),
            'movie_id' => $request->movie_id,
        ]);

        return response()->json(['status' => true]);
    }
}
