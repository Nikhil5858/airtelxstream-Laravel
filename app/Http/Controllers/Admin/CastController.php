<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Traits\HandlesFileUpload;
use Illuminate\Http\Request;

class CastController extends Controller
{
    use HandlesFileUpload;

    public function index()
    {
        return view('admin.cast', [
            'casts' => Cast::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image',
            'bio' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
        ]);

        $data['profile_image_url'] = $this->uploadFile(
            $request->file('image'),
            'images',
            'cast'
        );

        Cast::create($data);

        return redirect()->route('admin.cast');
    }

    public function update(Request $request, Cast $cast)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image',
            'bio' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
        ]);

        $data['profile_image_url'] = $this->uploadFile($request->file('image'), 'images', 'cast')
            ?? $cast->getRawOriginal('profile_image_url');

        $cast->update($data);

        return redirect()->route('admin.cast');
    }

    public function destroy(Cast $cast)
    {
        $cast->delete();

        return redirect()->route('admin.cast');
    }
}
