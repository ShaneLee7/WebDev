<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Post::all()->each(function ($post) {
            // Each post receives likes from a random selection of users
            User::inRandomOrder()->take(rand(1, 10))->get()->each(function ($user) use ($post) {
                Like::create([
                    'post_id' => $post->id,
                    'user_id' => $user->id,
                ]);
            });
        });
    }
}