<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle,
            'tags' => fake()->words(3, true),
            'company' => fake()->company,
            'location' => fake()->city . ', ' . fake()->stateAbbr,
            'email' => fake()->safeEmail,
            'description' => fake()->paragraphs(3, true),
        ];
    }
}
