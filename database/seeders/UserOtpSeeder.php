<?php

namespace Database\Seeders;

use App\Models\UserOtp;
use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserOtpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = Users::first();

        if (! $user) {
            return;
        }

        UserOtp::create([
            'user_id'    => $user->id,
            'otp'        => '1234',
            'expires_at' => now()->addMinutes(5),
            'is_used'    => false,
            'created_at' => now(),
        ]);
    }
}
