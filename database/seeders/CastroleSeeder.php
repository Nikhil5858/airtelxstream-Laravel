<?php

namespace Database\Seeders;

use App\Models\Castrole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CastroleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Castrole::create([
            'name' => 'Actor',
        ]);
    }
}
