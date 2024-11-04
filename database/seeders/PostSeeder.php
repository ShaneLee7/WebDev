<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // For each user, create a random number of posts
        User::all()->each(function ($user) {
            Post::factory(rand(0, 5))->create([
                'user_id' => $user->id,
            ]);
        });
    }
}