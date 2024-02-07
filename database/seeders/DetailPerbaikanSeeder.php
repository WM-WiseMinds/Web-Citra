<?php

namespace Database\Seeders;

use App\Models\DetailPerbaikan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailPerbaikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailPerbaikan::factory(10)->create();
    }
}
