<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vote>
 */
class VoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(7, 9),
            //'candidate_id' => fake()->numberBetween(1, 6),
            'votVotoBlanco' => "0",
            'votVotoCandidato' => "0",
            'votVotoNulo' => "1",
        ];
    }
}
