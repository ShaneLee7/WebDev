<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Use an existing user randomly instead of creating a new one
            'user_id' => User::inRandomOrder()->first()->id,
            // Use an existing post randomly instead of creating a new one
            'post_id' => Post::inRandomOrder()->first()->id,
            'content' => $this->faker->text(100),
            'parent_id' => null, // Top-level comment does not have a parent
        ];
    }

    /**
     * Create a comment along with its replies.
     *
     * @param int $replyCount
     * @return Comment
     */
    public function createWithReplies(int $replyCount = 3): Comment
    {
        // Create the main comment
        $comment = $this->create();

        // Create replies for the comment
        for ($i = 0; $i < $replyCount; $i++) {
            Comment::factory()->create([
                'post_id' => $comment->post_id,
                'user_id' => User::inRandomOrder()->first()->id, // Select an existing user randomly for each reply
                'parent_id' => $comment->id, // Set the parent_id to the original comment's ID
                'content' => $this->faker->sentence(), // Generate random content for replies
            ]);
        }

        return $comment;
    }
}
