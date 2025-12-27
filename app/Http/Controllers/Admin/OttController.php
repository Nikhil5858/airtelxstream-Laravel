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
        return view('admin.ott',compact('otts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image'
        ]);

        OttProvider::create([
            'name'      => $request->name,
            'logo_url'  => $request->file('logo'),
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.ott');
    }

    public function update(Request $request, OttProvider $ott)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image'
        ]);

        $ott->name = $request->name;
        $ott->is_active = $request->has('is_active');

        if ($request->hasFile('logo')) {
            $ott->logo_url = $request->file('logo');
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
