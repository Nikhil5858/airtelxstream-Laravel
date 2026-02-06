<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Users::create([
            'name' => 'Admin',
            'email' => 'admin@airtelxstream.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
            'is_active' => true,
        ]);
    }
}
