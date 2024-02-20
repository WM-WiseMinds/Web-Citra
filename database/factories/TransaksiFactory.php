<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'perbaikan_id' => $this->faker->randomNumber('1', '10'),
            'jumlah' => $this->faker->randomNumber('1', '8'),
            'total_biaya' => $this->faker->randomNumber('5',),
        ];
    }
}
