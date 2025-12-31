<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\UserOtp;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string',
        ]);

        $user = Users::firstOrCreate(
            ['email' => $request->email],
            [
                'name' => $request->name,
                'password' => bcrypt(str()->random(16)),
                'role' => 'user',
                'is_active' => true,
            ]
        );

        $otp = random_int(1000, 9999);

        UserOtp::create([
            'user_id' => $user->id,
            'otp' => $otp,
            'expires_at' => now()->addMinutes(5),
            'is_used' => false,
        ]);

        Mail::raw("Your OTP is: {$otp}", function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Your Login OTP');
        });

        return response()->json([
            'status' => true,
            'message' => 'OTP sent to email',
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:4',
        ]);

        $user = Users::where('email', $request->email)->first();

        if (! $user) {
            return response()->json(['message' => 'Invalid user'], 401);
        }

        $otpRow = UserOtp::where('user_id', $user->id)
            ->where('otp', $request->otp)
            ->where('is_used', false)
            ->where('expires_at', '>', now())
            ->latest('created_at')
            ->first();

        if (! $otpRow) {
            return response()->json(['message' => 'Invalid or expired OTP'], 401);
        }

        $otpRow->update(['is_used' => true]);

        Auth::login($user);

        return response()->json([
            'status' => true,
            'redirect' => route('dashboard'),
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('dashboard');
    }
}
