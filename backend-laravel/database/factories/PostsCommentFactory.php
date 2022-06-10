<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostsComment>
 */
class PostsCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'body' => $this->faker->text(),
            'vote' => rand(0, 1),
            'user_id' => User::inRandomOrder()->first()->id,
            'post_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
