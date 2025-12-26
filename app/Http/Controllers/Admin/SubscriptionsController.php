<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionsController extends Controller
{
    public function index(){

        $plans = Subscription::orderBy('price')->get();
        return view('admin.subscriptions',compact('plans'));
    }

    public function store(Request $request){
        $request->validate([
            'plan_name' => 'required|string',
            'price' => 'required|numeric',
            'duration_days' => 'required|integer',
        ]);

        Subscription::create([
            'plan_name' => $request->plan_name,
            'price' => $request->price,
            'duration_days' => $request->duration_days,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.subscriptions')->with('success','Plan Created');
    }

    public function update(Request $request, Subscription $subscription)
    {
        $request->validate([
            'plan_name' => 'required|string',
            'price' => 'required|numeric',
            'duration_days' => 'required|integer',
        ]);

        $subscription->update([
            'plan_name' => $request->plan_name,
            'price' => $request->price,
            'duration_days' => $request->duration_days,
            'is_active' => $request->boolean('is_active'),
        ]);

        return back()->with('success', 'Plan updated');
    }
    
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return back()->with('success', 'Plan deleted');
    }
}
