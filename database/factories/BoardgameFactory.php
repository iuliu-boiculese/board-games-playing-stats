<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Boardgame>
 */
class BoardgameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->sentence(),
            'slug' => fake()->slug(),
            'release_year' => fake()->year(),
            'thumbnail' => fake()->image(storage_path('app/public/thumbnails'), 100, 100, null, false),
            'bgg_url' => fake()->url()
        ];

    }
}
