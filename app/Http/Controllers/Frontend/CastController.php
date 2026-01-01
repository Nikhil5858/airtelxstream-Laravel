<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cast;

class CastController extends Controller
{
    public function show(Cast $cast)
    {
        return view('frontend.cast.show', compact('cast'));
    }    
}
