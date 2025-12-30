<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\OttProvider;
use App\Models\Users;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'totalMovies' => Movie::count(),
            'totalUsers'  => Users::count(),
            'activeSubs'  => Users::where('is_subscription_active', true)->count(),
            'totalOtts'   => OttProvider::count(),
        ];

        $recentMovies = Movie::with('ott')
            ->latest()
            ->take(6)
            ->get();

        return view('admin.admindashboard', compact('stats', 'recentMovies'));
    }
}
