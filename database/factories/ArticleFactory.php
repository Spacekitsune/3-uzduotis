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
            'title' => $this->faker->word(),         
            'excerpt' => $this->faker->realText($maxNbChars = 500, $indexSize = 2),
            'description' => $this->faker->realText($maxNbChars = 2000, $indexSize = 2),
            'author' => $this->faker->firstName(),  
            'category' => rand(1,6)
        ];
    }
}
