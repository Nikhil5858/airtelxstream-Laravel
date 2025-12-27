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
        $data = [
            ['name' => 'Jio + Hotstar', 'logo_url' => 'ottlogo1.webp'],
            ['name' => 'SonyLIV', 'logo_url' => 'ottlogo2.webp'],
            ['name' => 'Zee5', 'logo_url' => 'ottlogo3.webp'],
            ['name' => 'MX Player', 'logo_url' => 'ottlogo4.webp'],
            ['name' => 'SUN NXT', 'logo_url' => 'ottlogo5.webp'],
            ['name' => 'Times Play', 'logo_url' => 'ottlogo6.webp'],
            ['name' => 'LionsGate Play', 'logo_url' => 'ottlogo7.webp'],
            ['name' => 'Hungama Ott', 'logo_url' => 'ottlogo8.webp'],
            ['name' => 'Adda Times', 'logo_url' => 'ottlogo9.webp'],
        ];

        foreach ($data as $row) {
            OttProvider::create([
                'name'      => $row['name'],
                'logo_url'  => $row['logo_url'],
                'is_active' => true,
            ]);
        }
    }
}
