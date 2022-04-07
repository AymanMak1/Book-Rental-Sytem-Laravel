<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookGenre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->unique()->randomElement(['Action and adventure', 'Architecture','Alternate history', 'Autobiography',
        'Anthology','Biography','Business','Culture','Economics','Children','Cooking','Diary','Crime','Education','Encyclopedia','Drama',
        'Fairytale','Health and fitness','Fantasy','History','Horror',' Mystery', 'Psychology','Romance']);
        return [
            'name' => $name,
            'style' => $this->faker->randomElement(['bg-sky-500', 'bg-neutral-500', 'bg-green-500', 'bg-red-600',
            'bg-amber-400', 'bg-cyan-600', 'bg-slate-200', 'bg-neutral-900']),
            'slug' => Str::slug($name)
        ];
    }
}
