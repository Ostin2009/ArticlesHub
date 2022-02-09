<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subject' => $this->faker->sentence(3,true),
            'body' => $this->faker->realText(100),
            'article_id' => $this->faker->numberBetween(1, 20)
        ];
    }
}
