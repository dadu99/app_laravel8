<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->words(rand(1, 3), true);
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'slug' => $slug,

            'subtitle' => $this->faker->sentence(rand(4, 8)),
            'excerpt' => $this->faker->paragraph(rand(1, 3), true),
            'views' => rand(125, 2340),

            'meta_title' => $this->faker->words(rand(2, 5), true),
            'meta_description' => $this->faker->words(rand(10, 15), true),
            'meta_keywords' => $this->faker->words(rand(10, 20), true),

        ];
    }
}
