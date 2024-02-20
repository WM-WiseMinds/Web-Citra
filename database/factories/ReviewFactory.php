<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomNumber('1', '4'),
            'perbaikan_id' => $this->faker->randomNumber('1', '4'),
            'rating' => $this->faker->randomNumber('1', '5'),
            'comment' => $this->faker->text,
        ];
    }
}
