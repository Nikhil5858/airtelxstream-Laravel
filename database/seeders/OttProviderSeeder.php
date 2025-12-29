<?php

namespace Database\Seeders;

use App\Models\OttProvider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OttProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OttProvider::insert([
            [
                'name' => 'Jio + Hotstar',
                'logo_url' => 'ottlogo1.webp',
                'is_active' => true,
            ],
            [
                'name' => 'SonyLIV',
                'logo_url' => 'ottlogo2.webp',
                'is_active' => true,
            ],
            [
                'name' => 'Zee5',
                'logo_url' => 'ottlogo3.webp',
                'is_active' => true,
            ],
            [
                'name' => 'MX Player',
                'logo_url' => 'ottlogo4.webp',
                'is_active' => true,
            ],
            [
                'name' => 'SUN NXT',
                'logo_url' => 'ottlogo5.webp',
                'is_active' => true,
            ],
            [
                'name' => 'Times Play',
                'logo_url' => 'ottlogo6.webp',
                'is_active' => true,
            ],
            [
                'name' => 'LionsGate Play',
                'logo_url' => 'ottlogo7.webp',
                'is_active' => true,
            ],
            [
                'name' => 'Hungama Ott',
                'logo_url' => 'ottlogo8.webp',
                'is_active' => true,
            ],
            [
                'name' => 'Adda Times',
                'logo_url' => 'ottlogo9.webp',
                'is_active' => true,
            ],
        ]);
    }
}
