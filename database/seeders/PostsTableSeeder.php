<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostsTableSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create();

        $this->command->info('✅ Created 10 posts: ');
    }
}
