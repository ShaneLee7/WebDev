<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Follow>
 */
class FollowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $follower = User::inRandomOrder()->first();
        $followed = User::where('id', '!=', $follower->id)->inRandomOrder()->first(); // Ensure they are not the same user

        return [
            'follower_id' => $follower->id,
            'followed_id' => $followed->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
