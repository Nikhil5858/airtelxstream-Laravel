<?php

namespace Database\Seeders;

use App\Models\HomepageSection;
use Illuminate\Database\Seeder;

class HomepageSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomepageSection::create([
            'title' => 'New Releases',
            'slug' => 'new-releases',
            'type' => 'slider',
            'position' => 1,
            'is_active' => true,
        ]);

        HomepageSection::create([
            'title' => 'Top 10 Movies',
            'slug' => 'top-10-movies',
            'type' => 'top10',
            'position' => 2,
            'is_active' => true,
        ]);

    }
}
