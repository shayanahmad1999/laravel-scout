<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('movies')->insert([
            [
                'title' => 'The Artisan Code',
                'description' => 'A gripping tale of a developer who crafts elegant APIs by day and dreams in Laravel by night.',
                'author' => 'Shayan Ahmad',
                'release_year' => 2023,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Vue of Destiny',
                'description' => 'A frontend saga where components come alive and state management rules the realm.',
                'author' => 'Safe Solution Studios',
                'release_year' => 2024,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Retry Logic: The Reboot',
                'description' => 'When APIs fail, one developer rises to implement resilient retry strategies and centralized error handling.',
                'author' => 'BitCoderLabs',
                'release_year' => 2025,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Movie::factory(50)->create();
    }
}
