<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Castcontent;
use App\Models\Castrole;
use App\Models\Movie;
use Illuminate\Http\Request;

class CastContentController extends Controller
{
    public function index()
    {
        return view('admin.castcontent', [
            'items' => Castcontent::with(['movie', 'cast', 'role'])->get(),
            'movies' => Movie::orderBy('title')->get(),
            'casts' => Cast::orderBy('name')->get(),
            'roles' => Castrole::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'cast_id' => 'required|exists:cast,id',
            'cast_roles_id' => 'required|exists:castrole,id',
        ]);

        Castcontent::create($data);

        return redirect()->route('admin.castcontent');
    }

    public function update(Request $request, Castcontent $castContent)
    {
        $data = $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'cast_id' => 'required|exists:cast,id',
            'cast_roles_id' => 'required|exists:castrole,id',
        ]);

        $castContent->update($data);

        return redirect()->route('admin.castcontent');
    }

    public function destroy(Castcontent $castContent)
    {
        $castContent->delete();

        return redirect()->route('admin.castcontent');
    }
}
