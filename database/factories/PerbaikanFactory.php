<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perbaikan>
 */
class PerbaikanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomNumber('1', '5'),
            'bookingservice_id' => $this->faker->randomNumber('1', '4'),
            'keterangan' => $this->faker->word,
            'persetujuan' => $this->faker->randomElement(['Menunggu'])
        ];
    }
}
