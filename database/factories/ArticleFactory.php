<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->sentence(5, true);

        return [
        'user_id' => $this->faker->numberBetween(1, 5),
        'title' => $title,
        'slug' => Str::slug($title, '-'),
        'content' => $this->faker->realText(350),
        'likes' => $this->faker->numberBetween(1, 500),
        'views' => $this->faker->numberBetween(20, 1000),
        ];
    }
}
