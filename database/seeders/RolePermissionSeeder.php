<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Roles::findOrFail(1)->permissions()->sync([1, 2, 3, 4]);
        Roles::findOrFail(2)->permissions()->sync([1, 2, 3]);
        Roles::findOrFail(3)->permissions()->sync([1, 2]);
    }
}
