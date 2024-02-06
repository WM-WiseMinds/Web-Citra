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
            'jenis_barang' => 'enim',
            'nama' => 'Stacey Pouros',
            'no_hp' => '615-870-2399',
            'alamat' => '735 Roob Grove North Marisa, NY 91863',
            'kerusakan' => 'Ut qui a dolorem laborum id laudantium.',
            'tanggal_booking' => '2014-10-10',
            'user_id' => '1',
        ];
    }
}
