<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Comment;



class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all posts to associate comments with
        $posts = Post::all();

        // Create comments for each post
        foreach ($posts as $post) {
            // Create top-level comments
            $comments = Comment::factory(3)->create([
                'post_id' => $post->id,
            ]);

            // Create replies for each top-level comment
            foreach ($comments as $comment) {
                Comment::factory(rand(0, 3))->create([
                    'post_id' => $post->id,
                    'parent_id' => $comment->id, // Set parent id once replied
                ]);
            }
        }
    }
}