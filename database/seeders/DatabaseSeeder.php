<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([UsersSeeder::class]);
        $this->call([SubscriptionsSeeder::class]);
        $this->call([GenreSeeder::class]);
        $this->call([MovieSeeder::class]);
    }
}
