<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = Users::orderByDesc('id')->get();

        return view('admin.users', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role' => 'required|in:admin,user',
            'is_subscription_active' => 'nullable|in:0,1',
        ]);

        Users::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
            'is_active' => true,
            'is_subscription_active' => $request->has('is_subscription_active'),
        ]);

        return redirect()->route('admin.users');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'role' => 'required|in:admin,user',
            'is_subscription_active' => 'nullable|boolean',
        ]);

        $user = Users::findOrFail($data['id']);

        $user->update([
            'name' => $data['name'],
            'role' => $data['role'],
            'is_subscription_active' => $request->boolean('is_subscription_active'),
        ]);

        return redirect()->route('admin.users');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
        ]);

        Users::where('id', $request->id)->delete();

        return redirect()->route('admin.users');
    }
}
