<?php

namespace Database\Seeders;

use App\Models\Cast;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cast::create([
            'name' => 'Robert Downey Jr.',
            'profile_image_url' => 'cast_demo.jpg',
            'bio' => 'American actor and producer.',
            'date_of_birth' => '1965-04-04',
        ]);
    }
}
