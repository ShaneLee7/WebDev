<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\User;

class ReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch a random selection of comments to act as "parent" comments for replies
        $parentComments = Comment::inRandomOrder()->take(20)->get(); // Adjust number as needed

        $parentComments->each(function ($parentComment) {
            // Create between 1 and 3 replies for each parent comment
            Comment::factory(rand(1, 3))->create([
                'user_id' => User::inRandomOrder()->first()->id, // Random user for each reply
                'post_id' => $parentComment->post_id,             // Same post as the parent comment
                'parent_id' => $parentComment->id,                // Set parent_id to the selected comment
            ]);
        });
    }
}
