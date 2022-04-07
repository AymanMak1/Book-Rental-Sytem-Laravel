<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->text($maxNbChars = 20);
        return [
            'title'   => $title,
            'slug'    => Str::slug($title),
            'author'  => $this->faker->name,
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'released_at' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'pages' => $this->faker->numberBetween($min = 50, $max = 500),
            'language_code' => $this->faker->randomElement(['FRA','ENG','AR','HUN','DU']),
            'isbn' => $this->faker->numerify('#############'),
            'in_stock'=> $this->faker->numberBetween($min = 1, $max = 1000)
        ];
    }
}
