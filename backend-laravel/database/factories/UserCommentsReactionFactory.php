<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\PostsComment;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserCommentsReaction>
 */
class UserCommentsReactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'comment_id' => PostsComment::inRandomOrder()->first()->id,
        ];
    }
}
