<?php

namespace Database\Seeders;

use App\Models\Castcontent;
use Illuminate\Database\Seeder;

class CastcontentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Castcontent::create([
            'movie_id' => 1,
            'cast_id' => 1,
            'cast_roles_id' => 1,
        ]);
    }
}
