<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Subscription;

class MyplanController extends Controller
{
    public function index()
    {
        $plans = Subscription::query()
            ->where('is_active', true)
            ->orderBy('price')
            ->get();

        return view('frontend.myplan', compact('plans'));
    }
}
