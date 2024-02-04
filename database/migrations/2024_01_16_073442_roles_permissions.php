<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('role_permissions', function (Blueprint $table) {
            // Kolom 'role_id' adalah kunci luar (foreign key) yang terhubung dengan tabel 'roles' dan mengaktifkan opsi 'cascade' pada saat penghapusan.
            $table->foreignId('role_id')->constrained('roles')->cascadeOnDelete();

            // Kolom 'permission_id' adalah kunci luar (foreign key) yang terhubung dengan tabel 'permissions' dan mengaktifkan opsi 'cascade' pada saat penghapusan.
            $table->foreignId('permission_id')->constrained('permissions')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles_permissions');
    }
};
