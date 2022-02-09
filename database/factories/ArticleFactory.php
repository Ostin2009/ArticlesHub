<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'title' => $this->faker->sentence(5, true),
        'content' => $this->faker->realText(350),
        'likes' => $this->faker->numberBetween(1, 500),
        'views' => $this->faker->numberBetween(20, 1000)
        ];
    }
}
