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
        // Create a few posts to associate comments with
        $posts = Post::all()->create(); // Adjust the number of posts as needed

        // Create comments for each post
        foreach ($posts as $post) {
            // Create top-level comments, each with replies
            foreach (range(1, 3) as $index) { // Adjust number of top-level comments as needed
                Comment::factory()->createWithReplies(rand(1, 3)); // Create a comment with 1-3 replies
            }
        }
    }
}