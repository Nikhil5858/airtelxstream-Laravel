<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\Seasons;
use App\Traits\HandlesFileUpload;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EpisodesController extends Controller
{
    use HandlesFileUpload;

    // list episodes
    public function index()
    {
        return view('admin.episodes', [
            'episodes' => Episode::with('season.movie')
                ->orderBy('season_id')
                ->orderBy('episode_number')
                ->get(),

            'seasons' => Seasons::with('movie')
                ->orderBy('movie_id')
                ->orderBy('season_number')
                ->get(),
        ]);
    }

    // create episodes
    public function store(Request $request)
    {
        $data = $request->validate([
            'season_id' => 'required|exists:seasons,id',
            'episode_number' => [
                'required',
                'integer',
                'min:1',
                Rule::unique('episodes')
                    ->where('season_id', $request->season_id),
            ],

            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'poster_img' => 'nullable|image',
            'video_file' => 'nullable|mimes:mp4,mkv,avi',
        ]);

        $data['poster_img'] = $this->uploadFile(
            $request->file('poster_img'),
            'images',
            'episode'
        );

        $data['video_url'] = $this->uploadFile(
            $request->file('video_file'),
            'videos',
            'episode'
        );

        Episode::create($data);

        return redirect()->route('admin.episodes');
    }

    // update episodes
    public function update(Request $request, Episode $episode)
    {
        $data = $request->validate([
            'episode_number' => [
                'required',
                'integer',
                'min:1',
                Rule::unique('episodes')
                    ->where('season_id', $request->season_id),
            ],

            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data['poster_img'] =
            $this->uploadFile($request->file('poster_img'), 'images', 'episode')
            ?? $episode->getRawOriginal('poster_img');

        $data['video_url'] =
            $this->uploadFile($request->file('video_file'), 'videos', 'episode')
            ?? $episode->getRawOriginal('video_url');

        $episode->update($data);

        return redirect()->route('admin.episodes');
    }

    // delete episodes
    public function destroy(Episode $episode)
    {
        $episode->delete();

        return redirect()->route('admin.episodes');
    }
}
