<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'read']);
        Permission::create(['name' => 'update']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'export']);
        Permission::create(['name' => 'keranjang']);
        Permission::create(['name' => 'transaksi']);
        Permission::create(['name' => 'payment']);
        Permission::create(['name' => 'verifikasi']);

        $role = Role::create(['name' => 'pelanggan'])
            ->givePermissionTo(['keranjang', 'transaksi', 'payment']);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
