<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Watchlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** Profile main page */
    public function index()
    {
        $user = Auth::user();

        $watchlist = Watchlist::query()
            ->where('user_id', $user->id)
            ->with('movie')
            ->orderByDesc('id')
            ->get()
            ->map(function ($w) {
                return $w->movie;
            });

        return view('frontend.profile.profile', compact('user', 'watchlist'));
    }

    /** Help page */
    public function help()
    {
        return view('frontend.profile.help');
    }

    /** Language page */
    public function language()
    {
        return view('frontend.profile.language');
    }

    /** Logout */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /** Remove from watchlist */
    public function removeWatchlist(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|integer',
        ]);

        Watchlist::query()
            ->where('user_id', Auth::id())
            ->where('movie_id', $request->movie_id)
            ->delete();

        return response()->json(['status' => true]);
    }
}
