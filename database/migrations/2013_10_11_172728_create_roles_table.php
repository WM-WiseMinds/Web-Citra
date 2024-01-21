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
    // Membuat tabel 'roles' dengan kolom ID sebagai primary key,
    // kolom 'name' untuk nama peran, dan kolom 'timestamps' otomatis
    Schema::create('roles', function (Blueprint $table) {
        
        // Primary key dengan nilai ID yang unik untuk setiap peran
        $table->id(); 
        // Kolom untuk nama pemilik peran
        $table->string('name'); 
        // Kolom timestamp otomatis untuk pembuatan dan pembaruan
        $table->timestamps(); 
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menghapus tabel 'roles' jika perlu membatalkan migrasi ini
        Schema::dropIfExists('roles');
    }
};
