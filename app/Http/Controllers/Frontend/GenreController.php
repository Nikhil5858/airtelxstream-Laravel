<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Genre;

class GenreController extends Controller
{
    public function show(Genre $genre)
    {
        // automatic route model binding
    }
}
