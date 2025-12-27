<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Castrole;
use Illuminate\Http\Request;

class CastRoleController extends Controller
{
    public function index()
    {
        $castrole = Castrole::all();
        return view('admin.castrole',compact('castrole'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Castrole::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.castrole');
    }

    public function update(Request $request, Castrole $castrole)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $castrole->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.castrole');
    }

    public function destroy(Castrole $castrole)
    {
        $castrole->delete();

        return redirect()->route('admin.castrole');
    }
}
