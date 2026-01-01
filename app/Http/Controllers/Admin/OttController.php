<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OttProvider;
use App\Traits\HandlesFileUpload;
use Illuminate\Http\Request;

class OttController extends Controller
{
    use HandlesFileUpload;

    public function index()
    {
        $otts = OttProvider::all();

        return view('admin.ott', compact('otts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:png,jpg,jpeg,webp',
        ]);

        OttProvider::create([
            'name' => $request->name,
            'logo_url' => $this->uploadFile($request->file('logo'), 'images', 'ott'),
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.ott');
    }

    public function update(Request $request, OttProvider $ott)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,webp',
        ]);

        $ott->name = $request->name;
        $ott->is_active = $request->boolean('is_active');

        $logo = $this->uploadFile($request->file('logo'), 'images', 'ott');
        if ($logo) {
            $ott->logo_url = $logo;
        }

        $ott->save();

        return redirect()->route('admin.ott');
    }

    public function destroy(OttProvider $ott)
    {
        $ott->delete();

        return redirect()->route('admin.ott');
    }
}
