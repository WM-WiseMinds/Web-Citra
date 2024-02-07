<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Symfony\Component\String\b;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([RoleSeeder::class,]);
        $this->call([UserSeeder::class,]);
        $this->call([PermissionSeeder::class,]);
        $this->call([RolePermissionSeeder::class,]);
        $this->call([transaksiSeeder::class]);
        $this->call([BookingServiceSeeder::class]);
        $this->call([PerbaikanSeeder::class]);
    }
}
