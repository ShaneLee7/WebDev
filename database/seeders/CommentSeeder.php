<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;


class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Post::all()->each(function ($post) {
            Comment::factory(rand(1, 5))->create([
                'post_id' => $post->id,
                'user_id' => User::inRandomOrder()->first()->id, // Random user for each comment
            ]);
        });
    }
}