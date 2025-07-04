<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */

        User::factory()->create([
            'name' => 'John',
            'password' => 'Doe',
            // 'premium' => false,
        ]);

        User::factory()->create([
            'name' => 'Mary',
            'password' => 'Sue',
            // 'premium' => false,
        ]);

        User::factory()->create([
            'name' => 'Robot',
            'password' => 'Self',
            // 'premium' => false,
        ]);

        $this->call([
            ArticleSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
