<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OttProvider;
use Illuminate\Http\Request;

class OttController extends Controller
{
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

        $filename = null;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = uniqid('ott_').'.'.$file->extension();
            $file->move(public_path('assets/images'), $filename);
        }

        OttProvider::create([
            'name' => $request->name,
            'logo_url' => $filename,
            'is_active' => $request->has('is_active'),
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
        $ott->is_active = $request->has('is_active');

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = uniqid('ott_').'.'.$file->extension();
            $file->move(public_path('assets/images'), $filename);
            $ott->logo_url = $filename;
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
