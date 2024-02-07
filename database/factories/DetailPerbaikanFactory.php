<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailPerbaikan>
 */
class DetailPerbaikanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'perbaikan_id' => $this->faker->randomNumber('1','4'),
            'status' => $this->faker->word,
            'biaya' => $this->faker->randomNumber('1','6'),
        ];
    }
}
