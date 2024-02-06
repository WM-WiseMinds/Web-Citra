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
            'jenis_barang' => $this->faker->word,
            'persetujuan' => $this->faker->word,
            'keterangan' => $this->faker->word,
            'kerusakan' => $this->faker->word,
        ];
    }
}
