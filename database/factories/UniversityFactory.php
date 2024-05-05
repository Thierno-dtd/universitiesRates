<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\University>
 */
class UniversityFactory extends Factory
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
            'website' => fake()->url(),
            'location' => fake()->locale(),
            'image' => fake()->imageUrl,
            'description' => fake()->paragraph(),
            'avarageRating' =>fake()->numberBetween(1, 5),
            'haveFiliale' => fake()->boolean(),
        ];
    }
}
