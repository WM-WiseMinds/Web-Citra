<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookingService>
 */
class BookingServiceFactory extends Factory
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
            'jenis_barang' => $this->faker->word,
            'kerusakan' => $this->faker->word,
            'tanggal_booking' => $this->faker->date(),
            'status' => 'Belum Diproses'
        ];
    }
}
