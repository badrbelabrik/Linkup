<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostsTableSeeder extends Seeder
{
    public function run(): void
    {
        // Get or create a user
        $user = User::query()->first();

        if (!$user) {
            $user = User::query()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password123'),
                'headline' => 'Software Developer',
                'company' => 'Tech Corp',
                'image_url' => 'https://ui-avatars.com/api/?name=Test+User'
            ]);
        }

        // Create posts using factory
        Post::factory()
            ->count(10)
            ->create(['user_id' => $user->id]);

        $this->command->info('✅ Created 10 posts for user: ' . $user->email);
    }
}
