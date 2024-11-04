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
            'user_id' => User::factory(), // Create a new user for the comment
            'post_id' => Post::factory(), // Create a new post for the comment
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
        // Create the comment using the factory's definition
        $comment = $this->create();

        // Create replies for the comment
        for ($i = 0; $i < $replyCount; $i++) {
            Comment::factory()->create([
                'post_id' => $comment->post_id,
                'user_id' => User::factory(), // You can choose to assign a new user or the same user
                'parent_id' => $comment->id, // Set the parent_id to the original comment's ID
                'content' => $this->faker->sentence(), // Generate random content for replies
            ]);
        }

        return $comment;
    }
}
