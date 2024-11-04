<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Follow;
use App\Models\User;

class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        $users->each(function ($user) use ($users) {
            // Each user follows a random subset of other users
            $usersToFollow = $users->where('id', '!=', $user->id)->random(rand(1, 5));

            foreach ($usersToFollow as $followedUser) {
                Follow::create([
                    'follower_id' => $user->id,
                    'followed_id' => $followedUser->id,
                ]);
            }
        });
    }
}
