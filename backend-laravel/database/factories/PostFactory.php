<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{

    private $arrayDeMaterias = [
        'Modelagem de sistemas',
        'Calculo 2',
        'OO',
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(10),
            'body' => $this->faker->text(),
            'materia' => $this->arrayDeMaterias[array_rand($this->arrayDeMaterias)],
            'vote' => rand(0, 1),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
