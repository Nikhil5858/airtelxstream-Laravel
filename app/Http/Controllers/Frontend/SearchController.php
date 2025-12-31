<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /** Search page */
    public function index()
    {
        $trending = Movie::query()
            ->where('is_feature', true)
            ->orderByDesc('created_at')
            ->limit(10)
            ->get([
                'id',
                'title',
                'banner_url',
                'type',
            ]);

        return view('frontend.search', compact('trending'));
    }

    public function results(Request $request)
    {
        $q = trim($request->query('q', ''));

        if (strlen($q) < 2) {
            return response()->json([]);
        }

        $movies = Movie::query()
            ->where('title', 'like', '%' . $q . '%')
            ->orderBy('title')
            ->limit(20)
            ->get([
                'id',
                'title',
                'banner_url',
                'type',
            ]);

        return response()->json($movies);
    }
}
