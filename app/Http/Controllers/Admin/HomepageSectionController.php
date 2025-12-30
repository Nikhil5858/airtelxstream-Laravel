<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageSection;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomepageSectionController extends Controller
{
    public function index()
    {
        $sections = HomepageSection::orderBy('position')->get();

        return view('admin.homepagesection', compact('sections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'type' => 'required|in:slider,top10',
        ]);

        HomepageSection::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'type' => $request->type,
            'position' => HomepageSection::nextPosition(),
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.homepagesection');
    }

    public function update(Request $request, HomepageSection $homepagesection)
    {
        $request->validate([
            'title' => 'required|string',
            'type' => 'required|in:slider,top10',
            'position' => 'required|integer|min:1',
        ]);

        $homepagesection->update([
            'title' => $request->title,
            'type' => $request->type,
            'slug' => Str::slug($request->title),
            'position' => $request->position,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.homepagesection');
    }

    public function destroy(HomepageSection $homepagesection)
    {
        $homepagesection->delete();

        return redirect()->route('admin.homepagesection');
    }

    public function saveMovies(Request $request)
    {
        $section = HomepageSection::findOrFail($request->section_id);

        $movieIds = $request->movies ?? [];

        if ($section->type === 'top10') {
            $movieIds = array_slice($movieIds, 0, 10);
        }

        $syncData = [];
        foreach ($movieIds as $index => $movieId) {
            $syncData[$movieId] = ['position' => $index + 1];
        }

        $section->movies()->sync($syncData);

        return redirect()->route('admin.homepagesection');
    }

    public function movies(Request $request)
    {
        $slug = $request->query('section');

        if (! $slug) {
            abort(404);
        }

        $section = HomepageSection::where('slug', $slug)->firstOrFail();

        $allMovies = Movie::orderBy('title')->get();

        $sectionMovies = $section->movies()
            ->orderBy('homepage_section_movies.position')
            ->get();

        return view('admin.homepagesectionmovies', compact(
            'section',
            'allMovies',
            'sectionMovies'
        ));
    }

    public function reorder(Request $request)
    {
        $rows = $request->json()->all();

        foreach ($rows as $row) {
            HomepageSection::where('id', $row['id'])->update(['position' => $row['position']]);
        }

        return response()->noContent();
    }
}
