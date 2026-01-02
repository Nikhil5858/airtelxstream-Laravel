<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyplanController extends Controller
{
    public function index()
    {
        $plans = Subscription::query()
            ->where('is_active', true)
            ->orderBy('price')
            ->get();

        return view('frontend.myplan', compact('plans'));
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'subscription_id' => 'required|exists:subscriptions,id',
        ]);

        $user = Auth::user();
        $plan = Subscription::findOrFail($request->subscription_id);

        UserSubscription::create([
            'user_id' => $user->id,
            'subscription_id' => $plan->id,
            'start_date' => now(),
            'end_date' => now()->addDays($plan->duration_days),
            'status' => 'active',
            'is_autorenew' => true,
        ]);

        return redirect()->route('myplan')->with('success', 'Subscription activated successfully');
    }
}
