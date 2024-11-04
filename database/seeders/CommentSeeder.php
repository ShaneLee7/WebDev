<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            Comment::factory()->count(3)->create(['post_id' => $post->id, 'user_id' => $post->user_id]);
        }
    }
}
